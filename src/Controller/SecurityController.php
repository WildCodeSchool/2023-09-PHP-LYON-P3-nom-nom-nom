<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/my-profil', name: 'app_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('security/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('my-profil/favorite', name: 'app_profile_favorite_recipes')]
    public function favoriteRecipes(RecipeRepository $recipeRepository): Response
    {
        $user = $this->getUser();
        $totalFavoriteRecipes = $recipeRepository->countFavoriteRecipes($user);
        return $this->render('security/profile_favorite.html.twig', [
            'user' => $user,
            'totalFavoriteRecipes' => $totalFavoriteRecipes
        ]);
    }
}
