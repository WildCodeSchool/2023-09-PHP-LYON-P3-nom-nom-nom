<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\CategoryRepository;
use App\Repository\RecipeRepository;
use App\Service\ImageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    public function index(
        RecipeRepository $recipeRepository,
        CategoryRepository $categoryRepository,
        ImageService $imageService
    ): Response {
        $showRecipes = $recipeRepository->findBy(
            [], // No specific conditions
            ['id' => 'DESC'],
            3 // Limit to 3 recipes
        );

        $imagePaths = $imageService->verifyFilesRecipePictures($showRecipes);

        $totalRecipes = $recipeRepository->countRecipes();

        $categories = $categoryRepository->findAll();

        return $this->render('home/index.html.twig', [
            'showRecipes' => $showRecipes,
            'totalRecipes' => $totalRecipes,
            'categories' => $categories,
            'imagePaths' => $imagePaths,
        ]);
    }
}
