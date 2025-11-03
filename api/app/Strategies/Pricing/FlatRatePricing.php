<?php

namespace App\Strategies\Pricing;

use App\Strategies\PricingStrategyInterface;

class FlatRatePricing implements PricingStrategyInterface {

  public function calculatePrice(float $basePrice, int $quantity): float
  {
    return $basePrice;
  }
}