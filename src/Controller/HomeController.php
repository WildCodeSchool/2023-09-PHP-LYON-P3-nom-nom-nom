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
        $recipes = $recipeRespository->findBy(
            [],
            ['id' => 'DESC'],
            3
        );
        return $this->render('home/index.html.twig', [
            'recipes' => $recipes
        ]);
    }

    #[Route('/inconstruction', name: 'app_home_inconstruction')]
    public function inconstruction(): Response
    {
        return $this->render('home/inconstruction.html.twig');
    }
}
