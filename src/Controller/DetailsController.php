<?php

namespace App\Controller;

use App\Repository\BaivietRepository; // Add this use statement
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\BaivietType;
use App\Entity\Baiviet;



class DetailsController extends AbstractController
{
    #[Route('/details/{id}', name: 'details_show', methods: ['GET'])]
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/details/{id}', name: 'details_show', methods: ['GET'])]
    public function detailsAction($id): Response
    {
        $baiviet = $this->doctrine->getRepository(Baiviet::class)->find($id);

        if (!$baiviet) {
            throw $this->createNotFoundException('Bai viet not found');
        }

        return $this->render('details/index.html.twig', [
            'baiviet' => $baiviet,
        ]);
    }
}