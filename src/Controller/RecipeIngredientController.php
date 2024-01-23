<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeIngredientRepository;
use App\Service\ImageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recettes')]
class RecipeIngredientController extends AbstractController
{
    #[Route('/{slug}/Ingredients', name: 'app_recipe_show_ingredients', methods: ['GET'])]
    public function showIngredients(
        Recipe $recipe,
        RecipeIngredientRepository $recipeIngredientRepo,
        ImageService $imageService,
    ): Response {
        $recipeIngredients = $recipeIngredientRepo->findBy(['recipe' => $recipe]);
        $imagePath = $imageService->verifyFileRecipePicture($recipe);
        $slug = $recipe->getSlug();

        return $this->render("recipe/recipe_ingredients.html.twig", [
            'recipe' => $recipe,
            'slug' => $slug,
            'recipeIngredients' => $recipeIngredients,
            'imagePath' => $imagePath,
        ]);
    }
}
