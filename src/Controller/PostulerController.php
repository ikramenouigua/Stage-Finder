<?php

namespace App\Controller;

use App\Entity\Postuler;

use App\Repository\PostulereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class PostulerController extends AbstractController
{
    
   

    #[Route('/OFFRES_entreprises', name: 'OFFRES_entreprises')]
    public function orders(OffresRepository $offresRepository): Response
    {
        return $this->render('offres/index.html.twig', [
            'offres' => $offresRepository->findBy([], ['id' => 'asc'])
        ]);
    }

    
    #[Route('/postuler/{id}', name: 'postuler',methods: ['GET'])]
    public function postuler(EntityManagerInterface $entityManager, $id): Response
    {
        $user = $this->getUser();
        $postuler = new  Postuler();
        $postuler->setName($user->getFirstname());
        $postuler->setLastname($user->getLastname());
        $postuler->setEmail($user->getEmail());
        $postuler->setIdOffre(1);
        $postuler->setIdUser($user->getId());
      
        $postuler->setIdOffre($id);
        $entityManager->persist($postuler);
        $entityManager->flush();

        return $this->redirectToRoute('app_offre_entreprise_index', [], Response::HTTP_SEE_OTHER);
    }
}
