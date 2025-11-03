<?php

namespace App\Strategies;

class PricingContext {

  private $pricing;

  public function __construct(PricingStrategyInterface $intp){
    $this->pricing = $intp;
  }

  public function calculatePrices (float $basePrice, int $quantity): float
  {
    return $this->pricing->calculatePrice($basePrice, $quantity);
  }
}