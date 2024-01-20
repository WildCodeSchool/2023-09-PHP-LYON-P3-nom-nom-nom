<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class RecipeFixture extends Fixture implements DependentFixtureInterface
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
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
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::RECIPES as $recipeFixture) {
            $recipe = new Recipe();
            $recipe->setNameRecipe($recipeFixture['nameRecipe']);
            $slug = $this->slugger->slug($recipeFixture['nameRecipe']);
            $recipe->setSlug($slug);
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
