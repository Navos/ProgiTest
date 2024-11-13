<?php
namespace Tests\Service;

use App\Service\CalculatorService;
use App\Service\CarType;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase{
  public function testCalculateTotalPrice_first(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 398,
      'buyerFee' => 39.8,
      'sellerFee' => 7.96,
      'associationFee' => 5.00,
      'storageFee' => 100,
      'totalPrice' => 550.76,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Common);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }

  public function testCalculateTotalPrice_second(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 501,
      'buyerFee' => 50,
      'sellerFee' => 10.02,
      'associationFee' => 10.00,
      'storageFee' => 100,
      'totalPrice' => 671.02,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Common);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }

  public function testCalculateTotalPrice_third(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 57,
      'buyerFee' => 10,
      'sellerFee' => 1.14,
      'associationFee' => 5.00,
      'storageFee' => 100,
      'totalPrice' => 173.14,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Common);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }

  public function testCalculateTotalPrice_fourth(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 1800,
      'buyerFee' => 180,
      'sellerFee' => 72,
      'associationFee' => 15.00,
      'storageFee' => 100,
      'totalPrice' => 2167,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Luxury);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }

  public function testCalculateTotalPrice_fifth(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 1100,
      'buyerFee' => 50,
      'sellerFee' => 22,
      'associationFee' => 15.00,
      'storageFee' => 100,
      'totalPrice' => 1287,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Common);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }

  public function testCalculateTotalPrice_sixth(): void
  {
    $service = new CalculatorService();
    $expected = [
      'basePrice' => 1000000,
      'buyerFee' => 200,
      'sellerFee' => 40000,
      'associationFee' => 20.00,
      'storageFee' => 100,
      'totalPrice' => 1040320,
    ];
    $results = $service->calculateTotalCarPrice($expected['basePrice'], CarType::Luxury);

    $this->assertEquals($expected['basePrice'], $results['basePrice']);
    $this->assertEquals($expected['buyerFee'], $results['buyerFee']);
    $this->assertEquals($expected['sellerFee'], $results['sellerFee']);
    $this->assertEquals($expected['associationFee'], $results['associationFee']);
    $this->assertEquals($expected['storageFee'], $results['storageFee']);
    $this->assertEquals($expected['totalPrice'], $results['totalPrice']);
  }
}