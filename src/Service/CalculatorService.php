<?php
namespace App\Service;

enum CarType: string {
  case Common = "common";
  case Luxury = "luxury";
}

class CalculatorService {
  const BASIC_FEE_PERCENT = 0.1;
  const BASIC_FEE_COMMON_MIN = 10;
  const BASIC_FEE_COMMON_MAX = 50;
  const BASIC_FEE_LUXURY_MIN = 25;
  const BASIC_FEE_LUXURY_MAX = 200;

  const SELLER_FEE_COMMON = 0.02;
  const SELLER_FEE_LUXURY = 0.04;

  const ASSOCIATION_FEE_TIER_1 = 5;
  const ASSOCIATION_FEE_TIER_1_MIN = 0;
  const ASSOCIATION_FEE_TIER_1_MAX = 500;
  const ASSOCIATION_FEE_TIER_2 = 10;
  const ASSOCIATION_FEE_TIER_2_MIN = 500;
  const ASSOCIATION_FEE_TIER_2_MAX = 1000;
  const ASSOCIATION_FEE_TIER_3 = 15;
  const ASSOCIATION_FEE_TIER_3_MIN = 1000;
  const ASSOCIATION_FEE_TIER_3_MAX = 3000;
  const ASSOCIATION_FEE_TIER_4 = 20;
  const ASSOCIATION_FEE_TIER_4_MIN = 3000;

  const MAX_STORAGE_FEE = 100;

  public function calculateTotalCarPrice(int $basePrice, CarType $type): array {
    $totalPrice = 0;
    $buyerFee = $this->calculateBuyerFee($basePrice, $type);
    $sellerFee = $this->calculateSellerFee($basePrice, $type);
    $associationFee = $this->calculateAssociationFee($basePrice, $type);
    $storageFee = $this->calculateStorageFee($basePrice, $type);
    $totalPrice = $basePrice + $buyerFee + $sellerFee + $associationFee + $storageFee;

    return [
      'basePrice' => $basePrice,
      'buyerFee' => round($buyerFee, 2),
      'sellerFee' => round($sellerFee, 2),
      'associationFee' => round($associationFee, 2),
      'storageFee' => round($storageFee, 2),
      'totalPrice' => round($totalPrice, 2)
    ];
  }

  private function calculateBuyerFee(int $basePrice, CarType $type): float {
    $buyerFee = 0;
    if ($type == CarType::Common) {
      $buyerFee = $basePrice * self::BASIC_FEE_PERCENT;
      $buyerFee = min($buyerFee, self::BASIC_FEE_COMMON_MAX);
      $buyerFee = max($buyerFee, self::BASIC_FEE_COMMON_MIN);
    } else {
      $buyerFee = $basePrice * self::BASIC_FEE_PERCENT;
      $buyerFee = min($buyerFee, self::BASIC_FEE_LUXURY_MAX);
      $buyerFee = max($buyerFee, self::BASIC_FEE_LUXURY_MIN);
    }
    return $buyerFee;
  }

  private function calculateSellerFee(int $basePrice, CarType $type): float {
    $sellerFee = 0;
    if ($type == CarType::Common) {
      $sellerFee = $basePrice * self::SELLER_FEE_COMMON;
    } else {
      $sellerFee = $basePrice * self::SELLER_FEE_LUXURY;
    }
    return $sellerFee;
  }

  private function calculateAssociationFee(int $basePrice): float {
    $associationFee = 0;
    if ($basePrice >= self::ASSOCIATION_FEE_TIER_1_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_1_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_1;
    } else if ($basePrice > self::ASSOCIATION_FEE_TIER_2_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_2_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_2;
    } else if ($basePrice > self::ASSOCIATION_FEE_TIER_3_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_3_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_3;
    } else if ($basePrice >= self::ASSOCIATION_FEE_TIER_4_MIN) {
      $associationFee = self::ASSOCIATION_FEE_TIER_4;
    }
    return $associationFee;
  }

  private function calculateStorageFee(): float {
    return self::MAX_STORAGE_FEE;
  }
}
