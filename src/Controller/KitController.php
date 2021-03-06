<?php

namespace App\Controller;

use App\Entity\Kit;
use App\Form\KitType;
use App\Repository\KitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/kit')]
class KitController extends AbstractController
{
    #[Route('/', name: 'kit_index', methods: ['GET'])]
    public function index(KitRepository $kitRepository): Response
    {
        return $this->render('kit/index.html.twig', [
            'kits' => $kitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'kit_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $kit = new Kit();
        $form = $this->createForm(KitType::class, $kit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kit);
            $entityManager->flush();

            return $this->redirectToRoute('kit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('kit/new.html.twig', [
            'kit' => $kit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'kit_show', methods: ['GET'])]
    public function show(Kit $kit): Response
    {
        return $this->render('kit/show.html.twig', [
            'kit' => $kit,
        ]);
    }

    #[Route('/{id}/edit', name: 'kit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kit $kit): Response
    {
        $form = $this->createForm(KitType::class, $kit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('kit/edit.html.twig', [
            'kit' => $kit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'kit_delete', methods: ['POST'])]
    public function delete(Request $request, Kit $kit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kit_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/country-kits', name: 'country_kits', options: ['expose'=>true],methods: ['GET'])]
    public function getCountryKits(Request $request): Response
    {
        $kits = $this->getDoctrine()
            ->getRepository(Kit::class)
            ->getCountryKits($request->countryId);

        dump($kits);
        die;
    }
}
