<?php

namespace App\Controller;

use App\Repository\BaivietRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(BaivietRepository $baivietRepository): Response
    {
        $baiviet = $baivietRepository->findAll();

        return $this->render('home/index.html.twig', [
            'baiviet' => $baiviet,
        ]);
    }
}
