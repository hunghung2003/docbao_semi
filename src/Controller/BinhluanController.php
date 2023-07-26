<?php

namespace App\Controller;

use App\Entity\Binhluan;
use App\Form\BinhluanType;
use App\Repository\BinhluanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/binhluan')]
class BinhluanController extends AbstractController
{
    #[Route('/', name: 'app_binhluan_index', methods: ['GET'])]
    public function index(BinhluanRepository $binhluanRepository): Response
    {
        return $this->render('binhluan/index.html.twig', [
            'binhluans' => $binhluanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_binhluan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BinhluanRepository $binhluanRepository): Response
    {
        $binhluan = new Binhluan();
        $form = $this->createForm(BinhluanType::class, $binhluan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $binhluanRepository->save($binhluan, true);

        }

        return $this->renderForm('binhluan/new.html.twig', [
            'binhluan' => $binhluan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_binhluan_show', methods: ['GET'])]
    public function show(Binhluan $binhluan): Response
    {
        return $this->render('binhluan/show.html.twig', [
            'binhluan' => $binhluan,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_binhluan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Binhluan $binhluan, BinhluanRepository $binhluanRepository): Response
    {
        $form = $this->createForm(BinhluanType::class, $binhluan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $binhluanRepository->save($binhluan, true);

            return $this->redirectToRoute('app_binhluan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('binhluan/edit.html.twig', [
            'binhluan' => $binhluan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_binhluan_delete', methods: ['POST'])]
    public function delete(Request $request, Binhluan $binhluan, BinhluanRepository $binhluanRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$binhluan->getId(), $request->request->get('_token'))) {
            $binhluanRepository->remove($binhluan, true);
        }

        return $this->redirectToRoute('app_binhluan_index', [], Response::HTTP_SEE_OTHER);
    }
}
