<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixture extends Fixture implements DependentFixtureInterface
{
    public const RECIPES = [
        [
            'nameRecipe' => 'Cassoulet Toulousain',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'cassoulet.png',
            'description' => 'Découvrez le fameux cassoulet Toulousain... ',
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Donnër Kebab',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'kebab.png',
            'description' => 'Réaliser un kebab aussi bon que dans un snack',
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Gua Bao',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'guabao.png',
            'description' => 'Gouter ces délicieux sandwich chinois',
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'poulet aux haricots blancs',
            'prepareTime' => 45,
            'cookingTime' => 60,
            'personNumber' => 2,
            'picture' => 'poulet_haricot.jpeg',
            'description' => 'Un délicieux plat de poulet aux haricots blancs agrément
            d\'une délicieuse salade, d\'huile d\'olives et d\'oignons',
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'sandwich au poulet',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich.jpeg',
            'description' => 'Un délicieux sandwich au poulet auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'sandwich à la mortadelle',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich-mortadelle.png',
            'description' => 'Un délicieux sandwich à la mortadelle auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'sandwich au jambon beurre',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich-jambonbeurre.png',
            'description' => 'Un délicieux sandwich au jambon beurre auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'sandwich à la coppa',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich-coppa.png',
            'description' => 'Un délicieux sandwich à la coppa auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'sandwich au jambon cru',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich-jamboncrue.png',
            'description' => 'Un délicieux sandwich au jambon cru auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'sandwich au thon',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'sandwich-thon.png',
            'description' => 'Un délicieux sandwich au thon auquels ont a 
            rajouté des oignons, de la salade, des tomates',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'salade niçoise',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'salade-nicoise.png',
            'description' => 'Une salade niçoise digne des plus grandes salade',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'Osso buco',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'salade-nicoise.png',
            'description' => 'Une salade niçoise digne des plus grandes salade',
            'category' => 'category_Entrées'
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
            $recipe->setCategory($this->getReference($recipeFixture['category']));
            $manager->persist($recipe);
            $this->addReference('recipe_' . $recipeFixture['nameRecipe'], $recipe);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [IngredientFixtures::class,];
    }
}
