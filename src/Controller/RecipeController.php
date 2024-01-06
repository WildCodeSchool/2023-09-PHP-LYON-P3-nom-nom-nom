<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\RecipeType;
use App\Repository\RecipeIngredientRepository;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/recipe')]
class RecipeController extends AbstractController
{
    #[Route('/', name: 'app_recipe_index', methods: ['GET'])]
    public function index(RecipeRepository $recipeRepository): Response
    {
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_recipe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $number = 0;
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($recipe->getSteps() as $step) {
                $step->setRecipe($recipe);
                $step->setStepNumber($number += 1);
                $entityManager->persist($step);
            }
            foreach ($recipe->getIngredients() as $ingredient) {
                $ingredient->setRecipe($recipe);
                $entityManager->persist($ingredient);
            }

            $recipe->setOwner($this->getUser());
            $entityManager->persist($recipe);

            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recipe/new.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
            'number' => $number,
        ]);
    }

    #[Route('/{id}', name: 'app_recipe_show', methods: ['GET'])]
    public function show(Recipe $recipe): Response
    {
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recipe $recipe, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser() !== $recipe->getOwner() && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('danger', 'Seul l\'auteur de la recette peut la modifier.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($recipe->getSteps() as $step) {
                if (!$step->getId()) {
                    // Si l'étape n'a pas d'identifiant, elle n'est pas persistée
                    // Obtenez le dernier numéro d'étape pour la recette actuelle
                    $lastStepNumber = $entityManager->getRepository(Step::class)
                        ->findLastStepNumberForRecipe($recipe);

                    // Incrémente le dernier numéro d'étape
                    $newStepNumber = $lastStepNumber + 1;

                    // Définissez le numéro d'étape pour la nouvelle étape
                    $step->setStepNumber($newStepNumber);

                    // Persistez la nouvelle étape
                    $entityManager->persist($step);
                }
            }
            foreach ($recipe->getIngredients() as $ingredient) {
                if (!$ingredient->getId()) {
                    $entityManager->persist($ingredient);
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recipe/edit.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recipe_delete', methods: ['POST'])]
    public function delete(Request $request, Recipe $recipe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $recipe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($recipe);
            $entityManager->flush();
            $this->addFlash('danger', 'La recette est supprimée');
        }

        return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/steps', name: 'app_recipe_show_step', methods: ['GET'])]
    public function showSteps(
        Recipe $recipe,
        string $id,
        RecipeRepository $recipeRepository,
        StepRepository $stepRepository
    ): Response {
        $recipe = $recipeRepository->findOneBy(['id' => $id]);
        $steps = $stepRepository->findBy(
            ['recipe' => $recipe],
            ['stepNumber' => 'ASC'],
        );
        return $this->render('recipe/recipe_step.html.twig', [
            'recipe' => $recipe,
            'steps' => $steps,
        ]);
    }

    #[Route('/{id}/ingredients', name: 'app_recipe_show_ingredients', methods: ['GET'])]
    public function showIngredients(
        Recipe $recipe,
        RecipeIngredientRepository $recipeIngredientRepo
    ): Response {
        $recipeIngredients = $recipeIngredientRepo->findBy(['recipe' => $recipe]);

        return $this->render("recipe/recipe_ingredients.html.twig", [
            'recipe' => $recipe,
            'recipeIngredients' => $recipeIngredients
        ]);
    }
}
