<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(
        Category $id,
        CategoryRepository $categoryRepository,
        RecipeRepository $recipeRepository
    ): Response {
        $category = $categoryRepository->findOneBy(['id' => $id]);
        $recipes = $recipeRepository->findBy(['category' => $category], ['nameRecipe' => 'ASC']);
        $countRecipesByCat = $recipeRepository->countRecipeByCat($category);

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'recipes' => $recipes,
            'countRecipesByCategory' => $countRecipesByCat,
        ]);
    }
}
