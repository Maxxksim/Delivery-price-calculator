<?php

namespace App\Controller;

use App\Dto\ShippingCalculateDto;
use App\Service\ShippingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ShippingApiController extends AbstractController
{
    #[Route('api/shipping/carriers', name: 'api_shipping_show', methods: ['GET'])]
    public function show(ShippingService $service): JsonResponse
    {

        return $this->json([
            'carriers' => $service->getCarriers()
        ]);
    }

    #[Route('api/shipping/calculate', name: 'api_shipping_calculate', methods: ['POST'])]
    public function calculate(ShippingService $service, ValidatorInterface $validator, ShippingCalculateDto $dto, Request $request): JsonResponse
    {
        $data = $request->toArray();

        $dto->carrier = $data['carrier'];
        $dto->weightKg = $data['weightKg'];

        $violations = $validator->validate($dto);

        if (count($violations) > 0) {
            $errors = [];

            foreach ($violations as $violation) {
                $errors[$violation->getPropertyPath()][] = $violation->getMessage();
            }

            return new JsonResponse(['errors' => $errors], 422);
        }

        if (!in_array($dto->carrier, $service->getCarriers())) {
            return $this->json([
                'error' => 'Unsupported carrier',
            ], 404);
        }

        return $this->json([
            'carrier' => $dto->carrier,
            'weightKg' => $dto->weightKg,
            'currency' => 'EUR',
            'price' => $service->calculate($dto->carrier, $dto->weightKg)
        ], 200);
    }
}
