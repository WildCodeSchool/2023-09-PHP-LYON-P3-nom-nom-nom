<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    public function index(RecipeRepository $recipeRepository): Response
    {
        $showRecipes = $recipeRepository->findBy(
            [], // No specific conditions
            ['id' => 'DESC'],
            3 // Limit to 3 recipes
        );

        return $this->render('home/index.html.twig', [
            'showRecipes' => $showRecipes,
            'countRecipes' => $recipeRepository->countRecipes()
        ]);
    }
}
