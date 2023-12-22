<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\RecipeIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public const INGREDIENTS = [
        ['nameIngredient' => 'Carotte', 'category' => 'Légume'],
        ['nameIngredient' => 'Oignon','category' => 'Légume'],
        ['nameIngredient' => 'Tomate','category' => 'Légume'],
        ['nameIngredient' => 'Salade','category' => 'Légume'],
        ['nameIngredient' => 'Saucisse de Toulouse','category' => 'Viande'],
        ['nameIngredient' => 'Echine de porc','category' => 'Viande'],
        ['nameIngredient' => 'Filet de porc','category' => 'Viande'],
        ['nameIngredient' => 'Escalope de poulet','category' => 'Viande'],
        ['nameIngredient' => 'Pain Bao','category' => 'Céréale'],
        ['nameIngredient' => 'Pain Kebab','category' => 'Céréale'],
        ['nameIngredient' => 'Haricot blanc','category' => 'Légumineuse'],
        ['nameIngredient' => 'Cacahouéte','category' => 'Légumineuse'],
        ['nameIngredient' => 'Huile d\'olive','category' => 'Huile'],
        ['nameIngredient' => 'Thym','category' => 'Assaisonnement'],
        ['nameIngredient' => 'Nuoc-mâm','category' => 'Assaisonnement']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::INGREDIENTS as $ingredient) {
            $newIngredient = new Ingredient();
            $newIngredient->setNameIngredient($ingredient['nameIngredient']);
            $newIngredient->setCategory($ingredient['category']);
            $manager->persist($newIngredient);
            $this->addReference('ingredient_' . $ingredient['nameIngredient'], $newIngredient);
        }

        $manager->flush();
    }
}
