<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NguoidangController extends AbstractController
{
    #[Route('/nguoidang', name: 'app_nguoidang')]
    public function index(): Response
    {
        return $this->render('nguoidang/index.html.twig', [
            'controller_name' => 'NguoidangController',
        ]);
    }

}
