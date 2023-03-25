<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/card/{id}', name: 'card')]
    public function card(ManagerRegistry $doctrine): Response
    {
        //TODO: Affichage cartes enregistré et formulaire d'édition en callack avec modale
    }
}
