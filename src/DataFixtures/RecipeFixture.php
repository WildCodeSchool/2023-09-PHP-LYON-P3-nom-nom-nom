<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixture extends Fixture
{
    public const RECIPES = [
        [
            'nameRecipe' => 'Cassoulet Toulousain',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'cassoulet.png',
            'description' => 'Découvrez le fameux cassoulet Toulousain... ',
        ],
        [
            'nameRecipe' => 'Donnër Kebab',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'kebab.png',
            'description' => 'Réaliser un kebab aussi bon que dans un snack',
        ],
        [
            'nameRecipe' => 'Gua Bao',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'guabao.png',
            'description' => 'Gouter ces délicieux sandwich chinois',
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
            $recipe->setDescription($recipeFixture['description']);

            $manager->persist($recipe);
            $this->addReference('recipe_' . $recipeFixture['nameRecipe'], $recipe);
        }
        $manager->flush();
    }
}
