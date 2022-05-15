<?php

namespace App\Controller;

use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_stage_finder')]
    public function index(OffresRepository $offresRepository): Response
    {
        return $this->render('index.html.twig', [
            'offres' => $offresRepository->findBy([], ['id' => 'asc'])
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/testemonials', name: 'testemonials')]
    public function testemonials(): Response
    {
        return $this->render('pages/testemonials.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    

    #[Route('/stages', name: 'stages')]
    public function stages(OffresRepository $offresRepository): Response
    {
        return $this->render('pages/job-list.html.twig', [
            'offres' => $offresRepository->findBy([], ['id' => 'asc'])
        ]);
    }
}
