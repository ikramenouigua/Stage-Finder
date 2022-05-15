<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffresRepository;


class PostulerController extends AbstractController
{
   

    #[Route('/OFFRES_entreprises', name: 'OFFRES_entreprises')]
    public function orders(OffresRepository $offresRepository): Response
    {
        return $this->render('offres/index.html.twig', [
            'offres' => $offresRepository->findBy([], ['id' => 'asc'])
        ]);
    }
}
