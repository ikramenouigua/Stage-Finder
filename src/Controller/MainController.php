<?php

namespace App\Controller;

use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\OffreEntreprise;
use App\Form\OffreEntreprise1Type;
use App\Repository\OffreEntrepriseRepository;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_stage_finder')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offreEntreprises = $entityManager
        ->getRepository(OffreEntreprise::class)
        ->findAll();

    return $this->render('index.html.twig', [
        'offre_entreprises' => $offreEntreprises,
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
    public function stages(EntityManagerInterface $entityManager): Response
    {
        $offres = $entityManager
        ->getRepository(OffreEntreprise::class)
        ->findAll();

        return $this->render('pages/job-list.html.twig', [
            'offres' => $offres,
        ]);
    }
}
