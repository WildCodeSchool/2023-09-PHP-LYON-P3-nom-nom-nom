<?php

namespace App\Twig\Components;

use App\Repository\RecipeRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class RecipeAllSearch
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(private RecipeRepository $recipeRepository)
    {
    }

    public function getRecipes(): array
    {
        return $this->recipeRepository->findLikeNameRecipe($this->query);
    }
}
