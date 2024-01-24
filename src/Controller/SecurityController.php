<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/my-profil')]
class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('security/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit')]
    public function editProfile(): Response
    {
        $user = $this->getUser();
        return $this->render('security/profile_edit.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/favorite', name: 'app_profile_favorite_recipes')]
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
