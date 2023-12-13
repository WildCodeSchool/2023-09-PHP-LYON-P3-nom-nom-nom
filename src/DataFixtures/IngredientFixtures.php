<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public const INGREDIENT = [
        ['nameIngredient' => 'Carotte', 'Category' => 'Légumes'],
        ['nameIngredient' => 'Salade','Category' => 'Légumes'],
        ['nameIngredient' => 'Lait','Category' => 'Produits laitier'],
        ['nameIngredient' => 'Chocolat','Category' => 'Produits sucrés'],
        ['nameIngredient' => 'Huile d\'olive','Category' => 'Huile']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::INGREDIENT as $ingredientList) {
            $ingredient = new Ingredient();
            $nameIngredient = $ingredientList['nameIngredient'];
            $ingredient->setNameIngredient($nameIngredient);
            $ingredient->setCategory($ingredientList['Category']);
            $manager->persist($ingredient);
            $manager->flush();
        }
    }
}
