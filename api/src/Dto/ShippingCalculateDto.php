<?php

namespace App\Dto;


use Symfony\Component\Validator\Constraints as Assert;

class ShippingCalculateDto
{
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $carrier;

    #[Assert\NotBlank]
    #[Assert\Type('numeric')]
    #[Assert\GreaterThan(0)]
    public string $weightKg;
}

