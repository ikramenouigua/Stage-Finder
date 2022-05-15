<?php

namespace App\Controller;

use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(OffresRepository $offresRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'offres' => $offresRepository->findBy([], ['id' => 'asc'])
        ]);
    }
}
