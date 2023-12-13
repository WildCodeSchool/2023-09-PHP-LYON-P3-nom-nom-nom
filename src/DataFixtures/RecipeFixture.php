<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixture extends Fixture
{
    public const RECIPES = [
        ['nameRecipe' => 'Cassoulet Toulousin',
        'prepareTime' => 45,
        'cookingTime' => 60,
        'personNumber' => 2,
        'picture' => 'cassoulet_1.jpg',
        ],
    ];
    public function load(ObjectManager $manager): void
    {

        foreach (self::RECIPES as $recipeFixture) {
            $recipe = new Recipe();
            $recipe->setNameRecipe($recipeFixture['nameRecipe']);
            $recipe->setPrepareTime($recipeFixture['prepareTime']);
            $recipe->setCookingTime($recipeFixture['cookingTime']);
            $recipe->setPersonNumber($recipeFixture['personNumber']);
            $recipe->setPicture($recipeFixture['picture']);

            $manager->persist($recipe);
        }
        $manager->flush();
    }
}
