<?php

namespace App\Controller;

use App\Entity\Ad;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/ad/{id}', name: 'ad_infos')]
    public function ad(int $id): Response
    {
        // Récupération de l'annonce
        $ad = $this->em->getRepository(Ad::class)->find($id);

        return $this->render('ad/index.html.twig', [
            'ad' => $ad,
        ]);
    }

    #[Route('/ad/edit/{id}', name: 'ad_edit')]
    public function adEdit(int $id): Response
    {
        // Récupération de l'annonce
        $ad = $this->em->getRepository(Ad::class)->find($id);

        // TODO CREATION FORM MODAL

        return $this->render('ad/index.html.twig', [
            'ad' => $ad,
        ]);
    }

    #[Route('/ad/startMission/{id}', name: 'ad_start')]
    public function adStart(int $id): Response
    {
        // Récupération de l'annonce
        $ad = $this->em->getRepository(Ad::class)->find($id);

        // TODO : Le presta valide, le client reçoit une notification
        // Le paiement est déclenché coté client et bloquer côté serveur

        $message = 'Vous avez accepté la mission : ' . $ad->getTitle();
        $this->addFlash('success', $message);

        return $this->redirectToRoute('app_home');
    }

    #[Route('/ad/endMission/{id}', name: 'ad_end')]
    public function adEnd(int $id): Response
    {
        // Récupération de l'annonce
        $ad = $this->em->getRepository(Ad::class)->find($id);

        // TODO : La mission est terminée, si le client à lui aussi 
        // validé, on débloque le paiement

        $message = 'Vous avez terminé la mission : ' . $ad->getTitle();
        $this->addFlash('success', $message);


        return $this->redirectToRoute('app_home');
    }
}
