<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixture extends Fixture
{
    public const RECIPES = [
        ['nameRecipe' => 'Cassoulet Toulousin',
        'prepareTime' => '45',
        'cookingTime' => '60',
        'personNumber' => '2',
        'picture' => 'cassoulet_1.jpg',
        ],
    ];
    public function load(ObjectManager $manager): void
    {

        foreach (self::RECIPES as $RecipeFixture) {
            $recipe = new Recipe();
            $recipe->setNameRecipe($RecipeFixture['nameRecipe']);
            $recipe->setPrepareTime($RecipeFixture['prepareTime']);
            $recipe->setCookingTime($RecipeFixture['cookingTime']);
            $recipe->setPersonNumber($RecipeFixture['cookingTime']);
            $recipe->setPicture($RecipeFixture['picture']);
            
            $manager->persist($recipe);
        }
        $manager->flush();
    }
}