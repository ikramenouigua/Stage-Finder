<?php

namespace App\Controller;

use App\Entity\OffreEntreprise;
use App\Form\OffreEntreprise1Type;
use App\Repository\OffreEntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/offre/entreprise')]
class OffreEntrepriseController extends AbstractController
{
    #[Route('/', name: 'app_offre_entreprise_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offreEntreprises = $entityManager
            ->getRepository(OffreEntreprise::class)
            ->findAll();

        return $this->render('offres/index.html.twig', [
            'offre_entreprises' => $offreEntreprises,
        ]);
    }

    #[Route('/new', name: 'app_offre_entreprise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offreEntreprise = new OffreEntreprise();
        $form = $this->createForm(OffreEntreprise1Type::class, $offreEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offreEntreprise);
            $entityManager->flush();

            return $this->redirectToRoute('app_offre_entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre_entreprise/new.html.twig', [
            'offre_entreprise' => $offreEntreprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_entreprise_show', methods: ['GET'])]
    public function show(OffreEntreprise $offreEntreprise): Response
    {
        return $this->render('offre_entreprise/show.html.twig', [
            'offre_entreprise' => $offreEntreprise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_offre_entreprise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OffreEntreprise $offreEntreprise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreEntreprise1Type::class, $offreEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_offre_entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre_entreprise/edit.html.twig', [
            'offre_entreprise' => $offreEntreprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_entreprise_delete', methods: ['POST'])]
    public function delete(Request $request, OffreEntreprise $offreEntreprise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreEntreprise->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offreEntreprise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre_entreprise_index', [], Response::HTTP_SEE_OTHER);
    }
}
