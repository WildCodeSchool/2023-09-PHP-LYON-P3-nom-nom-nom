<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
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

    #[Route('my-profil/favorites', name: 'app_profile_favorites_recipes')]
    public function favoritesRecipes(): Response
    {
        $user = $this->getUser();
        return $this->render('security/profile-favorites.html.twig', [
            'user' => $user,
        ]);
    }
}
