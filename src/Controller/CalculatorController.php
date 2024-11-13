<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Service\CalculatorService;
use App\Service\CarType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    $logger->info('request', $request->getPayload()->all());
    $results = $calculatorService->calculateTotalCarPrice(398.00, CarType::from('common'));
    // return $this->render('form.html.twig', $results);
    return $this->json($results);
  }
}