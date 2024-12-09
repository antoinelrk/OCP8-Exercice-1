<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/cars', name: 'cars')]
    public function index(): Response
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    #[Route('/cars/add', name: 'cars.add')]
    public function add(): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        return $this->render('car/add.html.twig', [
            'controller_name' => 'CarController',
            'form' => $form,
        ]);
    }
}
