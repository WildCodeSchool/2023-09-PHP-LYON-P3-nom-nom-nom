<?php

namespace App\Service;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AccessControl extends AbstractController
{
    public function isNotOwner(Recipe $recipe): ?Response
    {
        // this method cheks if the user connected is the owner of the recipe AND checks ADMIN status
        if ($this->getUser() !== $recipe->getOwner() && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('danger', 'Seul l\'auteur de la recette peut la modifier.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return null;
    }

    public function isNotConnected(): ?Response
    {
        // this method checks if a user is connected AND checks ADMIN status
        if (!$this->isGranted('ROLE_CONTRIBUTOR') && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('danger', 'Connecter vous pour accéder à cette ressource.');

             return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return null;
    }
}
