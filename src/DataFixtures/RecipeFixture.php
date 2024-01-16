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
            'nameRecipe' => 'salade caesar',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'salade-caesar.jpg',
            'description' => 'Une salade caesar digne des plus grandes salade',
            'category' => 'category_Entrées'
        ],
        [
            'nameRecipe' => 'Osso buco',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'osso-buco.jpg',
            'description' => 'La célèbre recette traditionnelle de Milan' ,
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Quiche',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'quiche.jpg',
            'description' => 'Venez goûter à la succulente quiche' ,
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Tortilla',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'tortilla.jpg',
            'description' => 'La tortilla d\'Espagne' ,
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Ramen Japonais',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'ramen.jpg',
            'description' => 'Les ramens venus tout droit du Japon' ,
            'category' => 'category_Plats'
        ],
        [
            'nameRecipe' => 'Pasteis de nata',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'pasteis.jpg',
            'description' => 'Faites vibrer avec les pasteis de Lisbonne' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Pains perdus',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'pain-perdu.jpg',
            'description' => 'Les meilleurs pains perdus' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Brownie chocolat orange',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'brownie.jpg',
            'description' => 'Une recette à tomber par terre' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Tarte tatin',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'tatin.jpg',
            'description' => 'La tarte tatin de grand mère' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Tarte citron meringue',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'citron-meringue.jpg',
            'description' => 'La tarte citron préférée des enfants' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Verrine kiwi chantilly',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'verrine.jpg',
            'description' => 'Une recette simple et délicieuse' ,
            'category' => 'category_Desserts'
        ],
        [
            'nameRecipe' => 'Hummus',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'hummus.jpg',
            'description' => 'Retrouvez le hummus Libannais' ,
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'Nachos',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'nachos.jpg',
            'description' => 'Vibrer avec ces nachos croquants' ,
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'Jambon olive',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'jambon-olive.jpg',
            'description' => 'Recette très rapide à faire ' ,
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'Toast guacamole et oeufs',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'toast.jpg',
            'description' => 'Revisitez cette recette aux goûts exotique' ,
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'Tartare de boeuf',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'tartare.jpg',
            'description' => 'Un tartare de boeuf exquis' ,
            'category' => 'category_Apéritifs'
        ],
        [
            'nameRecipe' => 'Carpaccio de boeuf',
            'prepareTime' => 15,
            'cookingTime' => 10,
            'personNumber' => 2,
            'picture' => 'carpaccio.jpg',
            'description' => 'Carpaccio de boeuf et parmesan' ,
            'category' => 'category_Apéritifs'
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
