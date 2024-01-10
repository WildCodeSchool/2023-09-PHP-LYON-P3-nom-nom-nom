<?php

namespace App\Service;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccessControl extends AbstractController
{
    public function checkIfLoggedUserIsAuthor(Recipe $recipe): bool
    {
        // this method cheks if the user connected is the owner of the recipe AND checks ADMIN status
        if ($this->getUser() !== $recipe->getOwner() && !$this->isGranted('ROLE_ADMIN')) {
            return false;
        } else {
            return true;
        }
    }

    public function checkIfUserLoggedIn(): bool
    {
        // this method checks if a user is connected AND checks ADMIN status
        if (!$this->isGranted('ROLE_CONTRIBUTOR') && !$this->isGranted('ROLE_ADMIN')) {
            return false;
        } else {
            return true;
        }
    }
}
