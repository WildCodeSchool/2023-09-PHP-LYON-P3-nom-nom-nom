<?php

namespace App\DataFixtures;

use App\Entity\RecipeIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public const RECIPEINGREDIENTS = [
        ['quantity' => 2, 'unity' => 'petites', 'ingredient' => 'ingredient_Carotte',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 1, 'unity' => 'petit', 'ingredient' => 'ingredient_Oignon',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 4, 'unity' => 'grandes', 'ingredient' => 'ingredient_Saucisse de Toulouse',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 200, 'unity' => 'grammes', 'ingredient' => 'ingredient_Echine de porc',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 400, 'unity' => 'grammes', 'ingredient' => 'ingredient_Haricot blanc',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 1, 'unity' => 'cuillère à soupe', 'ingredient' => 'ingredient_Huile d\'olive',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 1, 'unity' => 'brin', 'ingredient' => 'ingredient_Thym',
        'recipe' => 'recipe_Cassoulet Toulousain'],
        ['quantity' => 4, 'unity' => 'pain', 'ingredient' => 'ingredient_Pain Bao',
        'recipe' => 'recipe_Gua Bao'],
        ['quantity' => 500, 'unity' => 'grammes', 'ingredient' => 'ingredient_Filet de porc',
        'recipe' => 'recipe_Gua Bao'],
        ['quantity' => 50, 'unity' => 'grammes', 'ingredient' => 'ingredient_Cacahouéte',
        'recipe' => 'recipe_Gua Bao'],
        ['quantity' => 2, 'unity' => 'cuillère à soupe', 'ingredient' => 'ingredient_Nuoc-mâm',
        'recipe' => 'recipe_Gua Bao'],
        ['quantity' => 4, 'unity' => 'pains', 'ingredient' => 'ingredient_Pain Kebab',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 1, 'unity' => 'unité', 'ingredient' => 'ingredient_Oignon',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 2, 'unity' => 'unité', 'ingredient' => 'ingredient_Tomate',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 1, 'unity' => 'unité', 'ingredient' => 'ingredient_Salade',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 500, 'unity' => 'grammes', 'ingredient' => 'ingredient_Escalope de poulet',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 10, 'unity' => 'cl', 'ingredient' => 'ingredient_Huile d\'olive',
        'recipe' => 'recipe_Donnër Kebab'],
        ['quantity' => 1, 'unity' => 'pièce(s)', 'ingredient' => 'ingredient_Pain',
        'recipe' => 'recipe_sandwich au poulet'],
        ['quantity' => 10, 'unity' => 'tranche(s)', 'ingredient' => 'ingredient_Escalope de poulet',
        'recipe' => 'recipe_sandwich au poulet'],
        ['quantity' => 4, 'unity' => 'pièce(s)', 'ingredient' => 'ingredient_Escalope de poulet',
        'recipe' => 'recipe_poulet aux haricots blancs'],
        ['quantity' => 100, 'unity' => 'g', 'ingredient' => 'ingredient_Huile d\'olive',
        'recipe' => 'recipe_poulet aux haricots blancs'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::RECIPEINGREDIENTS as $recipeIngredientFix) {
            $recipeIngredient = new RecipeIngredient();
            $recipeIngredient->setQuantity($recipeIngredientFix['quantity']);
            $recipeIngredient->setUnity($recipeIngredientFix['unity']);
            $recipeIngredient->setIngredient($this->getReference($recipeIngredientFix['ingredient']));
            $recipeIngredient->setRecipe($this->getReference($recipeIngredientFix['recipe']));


            $manager->persist($recipeIngredient);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            IngredientFixtures::class,
            RecipeFixture::class,
        ];
    }
}
