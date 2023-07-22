<?php

namespace App\Controller;

use App\Repository\BaivietRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    #[Route('/new', name: 'app_new')]
    public function index(BaivietRepository $baivietRepository): Response
    {
        $baiviets = $baivietRepository->findAll();

        return $this->render('new/index.html.twig', [
            'baiviet' => $baiviets,
        ]);
    }
}
