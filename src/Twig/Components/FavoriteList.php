<?php

namespace App\Twig\Components;

use App\Entity\Recipe;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Attribute\LiveAction;

#[AsLiveComponent]
final class FavoriteList
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Recipe $recipe;

    public function __construct(
        private readonly Security $security,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[LiveAction]
    public function toggle(): void
    {
     /** @var User $user */
        $user = $this->security->getUser();
        if ($user->getFavoriteList()->contains($this->recipe)) {
            $user->removeFromFavoriteList($this->recipe);
        } else {
            $user->addToFavoriteList($this->recipe);
        }
        $this->entityManager->flush();
    }
}
