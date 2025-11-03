<?php

namespace App\Strategies;

interface PricingStrategyInterface {
  public function calculatePrice(float $basePrice, int $quantity): float;
}