<?php

namespace App\Strategies\Pricing;

use App\Strategies\PricingStrategyInterface;

class PerHourPricing implements PricingStrategyInterface {

  public function calculatePrice(float $basePrice, int $quantity): float
  {
    return $basePrice * $quantity * 0.1;
  }
}