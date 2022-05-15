<?php

namespace App\Controller\Admin;



use App\Entity\Offres;
use App\Form\AjoutFormType;
use App\Repository\OffresRepository;
use App\Service\JWTService;
use App\Service\SendMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class OffreController extends AbstractController
{
    #[Route('/offre', name: 'offreEmp')]
    
    public function new(Request $request,EntityManagerInterface $entityManager): Response
    {
        $offre = new Offres();
        $form = $this->createForm(AjoutFormType::class, $offre);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('offreEmp');

        }
        return $this->render('admin/ajoutOffre/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
}
