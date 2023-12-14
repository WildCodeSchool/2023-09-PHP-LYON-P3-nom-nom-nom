<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RecipeRepository $recipeRespository): Response
    {
        $showRecipes = $recipeRespository->findBy(
            [],
            ['id' => 'DESC'],
            3
        );
        return $this->render('home/index.html.twig', [
            'showRecipes' => $showRecipes
        ]);
    }
}
