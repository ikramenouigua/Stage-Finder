<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'Profil de l\'utilisateur',
        ]);
    }

   // #[Route('/commandes', name: 'orders')]
  //  public function orders(): Response
  //  {
     //   return $this->render('profile/index.html.twig', [
       //     'controller_name' => 'Commandes de l\'utilisateur',
     //   ]);
  //  }
}
