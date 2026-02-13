import { createRouter, createWebHistory } from 'vue-router'
import ShippingPriceCalculate from '../views/ShippingPriceCalculate.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'ShippingPriceCalculate',
      component: ShippingPriceCalculate,
    },
  ],
})

export default router
