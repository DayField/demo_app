<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $ads = $em->getRepository(Ad::class)->findAll();
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('home/index.html.twig', [
            'ads' => $ads,
            'users' => $users,
        ]);
    }
}
