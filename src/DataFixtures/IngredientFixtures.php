<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public const INGREDIENT = [
        ['nameIngredient' => 'Carotte', 'Category' => 'Légume'],
        ['nameIngredient' => 'Oignon','Category' => 'Légume'],
        ['nameIngredient' => 'Saucisse de Toulouse','Category' => 'Viande'],
        ['nameIngredient' => 'Echine de porc','Category' => 'Viande'],
        ['nameIngredient' => 'Haricot blanc','Category' => 'Légumineuse'],
        ['nameIngredient' => 'Huile d\'olive','Category' => 'Huile'],
        ['nameIngredient' => 'Thym','Category' => 'Assaisonnement']
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

    public function getDependencies()
    {
        return [
          RecipeFixture::class,
        ];
    }
}
