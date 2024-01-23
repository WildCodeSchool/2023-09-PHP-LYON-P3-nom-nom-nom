<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use App\Repository\StepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recettes')]
class RecipeStepController extends AbstractController
{
    #[Route('/{slug}/Etapes', name: 'app_recipe_show_step', methods: ['GET'])]
    public function showSteps(
        Recipe $recipe,
        RecipeRepository $recipeRepository,
        StepRepository $stepRepository
    ): Response {
        $recipe = $recipeRepository->findOneBy(['slug' => $recipe->getSlug()]);
        $steps = $stepRepository->findBy(
            ['recipe' => $recipe],
            ['stepNumber' => 'ASC'],
        );
        $slug = $recipe->getSlug();
        return $this->render('recipe/recipe_step.html.twig', [
            'recipe' => $recipe,
            'slug' => $slug,
            'steps' => $steps,
        ]);
    }
}
