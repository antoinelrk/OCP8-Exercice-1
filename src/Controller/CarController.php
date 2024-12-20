<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/cars', name: 'cars')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('car/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    #[Route('/cars/show/{id}', name: 'cars.show')]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/cars/add', name: 'cars.add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entity = new Car();
        $form = $this->createForm(CarType::class, $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();

            return $this->redirectToRoute('cars');
        }

        return $this->render('car/add.html.twig', [
            'controller_name' => 'CarController',
            'form' => $form,
        ]);
    }

//    #[Route('/cars/add', name: 'cars.add')]
//    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
//    {
//        $entityManager->remove($car);
//        $entityManager->flush();
//
//        return $this->redirectToRoute('cars');
//    }
}
