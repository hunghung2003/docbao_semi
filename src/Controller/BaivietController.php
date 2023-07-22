<?php

namespace App\Controller;

use App\Entity\Baiviet;
use App\Form\BaivietType;
use App\Repository\BaivietRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/baiviet')]
class BaivietController extends AbstractController
{
    #[Route('/', name: 'app_baiviet_index', methods: ['GET'])]
    public function index(BaivietRepository $baivietRepository): Response
    {
        return $this->render('baiviet/index.html.twig', [
            'baiviets' => $baivietRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_baiviet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BaivietRepository $baivietRepository): Response
    {
        $baiviet = new Baiviet();
        $form = $this->createForm(BaivietType::class, $baiviet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baivietRepository->save($baiviet, true);

            return $this->redirectToRoute('app_baiviet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('baiviet/new.html.twig', [
            'baiviet' => $baiviet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_baiviet_show', methods: ['GET'])]
    public function show(Baiviet $baiviet): Response
    {
        return $this->render('baiviet/show.html.twig', [
            'baiviet' => $baiviet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_baiviet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Baiviet $baiviet, BaivietRepository $baivietRepository): Response
    {
        $form = $this->createForm(BaivietType::class, $baiviet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baivietRepository->save($baiviet, true);

            return $this->redirectToRoute('app_baiviet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('baiviet/edit.html.twig', [
            'baiviet' => $baiviet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_baiviet_delete', methods: ['POST'])]
    public function delete(Request $request, Baiviet $baiviet, BaivietRepository $baivietRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baiviet->getId(), $request->request->get('_token'))) {
            $baivietRepository->remove($baiviet, true);
        }

        return $this->redirectToRoute('app_baiviet_index', [], Response::HTTP_SEE_OTHER);
    }
}
