<?php

namespace App\Controller;

use App\Entity\Step;
use App\Entity\Recipe;
use App\Form\StepType;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/Etapes')]
#[IsGranted('ROLE_ADMIN')]
class StepController extends AbstractController
{
    #[Route('/{id}', name: 'app_step_show', methods: ['GET'])]
    public function show(Step $step): Response
    {
        return $this->render('step/show.html.twig', [
            'step' => $step,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_step_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Step $step, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StepType::class, $step);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_step_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('step/edit.html.twig', [
            'step' => $step,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_step_delete', methods: ['POST'])]
    public function delete(Request $request, Step $step, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $step->getId(), $request->request->get('_token'))) {
            $entityManager->remove($step);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_step_index', [], Response::HTTP_SEE_OTHER);
    }
}
