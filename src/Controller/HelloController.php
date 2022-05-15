<?php

namespace App\Controller;

use App\Entity\Hello;
use App\Form\HelloType;
use App\Repository\HelloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/hello')]
class HelloController extends AbstractController
{
    #[Route('/', name: 'app_hello_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $hellos = $entityManager
            ->getRepository(Hello::class)
            ->findAll();

        return $this->render('hello/index.html.twig', [
            'hellos' => $hellos,
        ]);
    }

    #[Route('/new', name: 'app_hello_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $hello = new Hello();
        $form = $this->createForm(HelloType::class, $hello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($hello);
            $entityManager->flush();

            return $this->redirectToRoute('app_hello_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hello/new.html.twig', [
            'hello' => $hello,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hello_show', methods: ['GET'])]
    public function show(Hello $hello): Response
    {
        return $this->render('hello/show.html.twig', [
            'hello' => $hello,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hello_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hello $hello, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HelloType::class, $hello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_hello_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hello/edit.html.twig', [
            'hello' => $hello,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hello_delete', methods: ['POST'])]
    public function delete(Request $request, Hello $hello, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hello->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hello);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_hello_index', [], Response::HTTP_SEE_OTHER);
    }
}
