<?php
namespace App\Entity;
use App\Service\CarType;
use Symfony\Component\Validator\Constraints as Assert;

class Car {
  #[Assert\Positive]
  #[Assert\NotBlank]
  protected float $price;
  #[Assert\NotBlank]
  protected CarType $type;

  public function getPrice(): float
  {
    return $this->price;
  }

  public function setPrice(float $price): void
  {
    $this->price = $price;
  }

  public function getType(): CarType
  {
    return $this->type;
  }

  public function setType(CarType $type): void
  {
    $this->type = $type;
  }
}
