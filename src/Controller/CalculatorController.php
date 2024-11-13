<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Car;
use App\Service\CalculatorService;
use App\Service\CarType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalculatorController extends AbstractController {
  #[Route('/calculate')]
  public function calculate(
    Request $request,
    LoggerInterface $logger,
    CalculatorService $calculatorService
  ): Response {
    $results = [];
    $car = new Car();
    $form = $this->createFormBuilder($car)
      ->add('Price', IntegerType::class)
      ->add('Type', EnumType::class, ['class' => CarType::class])
      ->add('save', SubmitType::class, ['label' => 'Calculate'])
      ->getForm();


    // $form->handleRequest($request);
    // $logger->info('results', );

    // if ($form->isSubmitted() && $form->isValid()) {
    // $car = $form->getData();

    // $results = $calculatorService->calculateTotalCarPrice($car->getPrice(), $car->getType());
    // $logger->info('results', $results);
    // }

    return $this->render('form.html.twig', ['form' => $form]);
  }
}