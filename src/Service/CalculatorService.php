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
    $basicBuyerFee = 0;
    $sellerFee = 0;
    $associationFee = 0;
    $totalPrice = 0;
    $storageFee = self::MAX_STORAGE_FEE;

    if ($type == CarType::Common) {
      $basicBuyerFee = $basePrice * self::BASIC_FEE_PERCENT;
      $basicBuyerFee = min($basicBuyerFee, self::BASIC_FEE_COMMON_MAX);
      $basicBuyerFee = max($basicBuyerFee, self::BASIC_FEE_COMMON_MIN);

      $sellerFee = $basePrice * self::SELLER_FEE_COMMON;
    } else {
      $basicBuyerFee = $basePrice * self::BASIC_FEE_PERCENT;
      $basicBuyerFee = min($basicBuyerFee, self::BASIC_FEE_LUXURY_MAX);
      $basicBuyerFee = max($basicBuyerFee, self::BASIC_FEE_LUXURY_MIN);

      $sellerFee = $basePrice * self::SELLER_FEE_LUXURY;
    }

    if ($basePrice >= self::ASSOCIATION_FEE_TIER_1_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_1_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_1;
    } else if ($basePrice > self::ASSOCIATION_FEE_TIER_2_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_2_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_2;
    } else if ($basePrice > self::ASSOCIATION_FEE_TIER_3_MIN && $basePrice <= self::ASSOCIATION_FEE_TIER_3_MAX) {
      $associationFee = self::ASSOCIATION_FEE_TIER_3;
    } else if ($basePrice >= self::ASSOCIATION_FEE_TIER_4_MIN) {
      $associationFee = self::ASSOCIATION_FEE_TIER_4;
    }

    $totalPrice = $basePrice + $basicBuyerFee + $sellerFee + $associationFee + $storageFee;

    return [
      'basePrice' => $basePrice,
      'basicBuyerFee' => round($basicBuyerFee, 2),
      'sellerFee' => round($sellerFee, 2),
      'associationFee' => round($associationFee, 2),
      'storageFee' => round($storageFee, 2),
      'totalPrice' => round($totalPrice, 2)
    ];
  }
}
