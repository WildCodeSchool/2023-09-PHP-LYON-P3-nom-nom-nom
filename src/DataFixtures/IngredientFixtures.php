<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public const INGREDIENTS = [
        ['nameIngredient' => 'Carotte', 'category' => 'Légume', 'picture' => 'carotte.png'],
        ['nameIngredient' => 'Oignon','category' => 'Légume', 'picture' => 'oignon.png'],
        ['nameIngredient' => 'Tomate','category' => 'Légume', 'picture' => 'tomate.png'],
        ['nameIngredient' => 'Salade','category' => 'Légume', 'picture' => 'laitue.jpeg'],
        ['nameIngredient' => 'Saucisse de Toulouse','category' => 'Viande', 'picture' => 'saucissedetoulouse.png'],
        ['nameIngredient' => 'Echine de porc','category' => 'Viande', 'picture' => 'echinedeporc.jpeg'],
        ['nameIngredient' => 'Filet de porc','category' => 'Viande', 'picture' => 'filetdeporc.jpeg'],
        ['nameIngredient' => 'Escalope de poulet','category' => 'Viande', 'picture' => 'escalopedepoulet.jpeg'],
        ['nameIngredient' => 'Pain Bao','category' => 'Céréale', 'picture' => 'bao.webp'],
        ['nameIngredient' => 'Pain Kebab','category' => 'Céréale', 'picture' => 'pain-kebab.jpg'],
        ['nameIngredient' => 'Haricot blanc','category' => 'Légumineuse', 'picture' => 'haricotblanc.jpeg'],
        ['nameIngredient' => 'Cacahuète','category' => 'Légumineuse', 'picture' => 'cacahuètes.jpeg'],
        ['nameIngredient' => 'Huile d\'olive','category' => 'Huile', 'picture' => 'huileolive.jpeg'],
        ['nameIngredient' => 'Thym','category' => 'Assaisonnement', 'picture' => 'thym.jpeg'],
        ['nameIngredient' => 'Nuoc-mâm','category' => 'Assaisonnement', 'picture' => 'nuoc-mam.jpeg'],
        ['nameIngredient' => 'Pain','category' => 'Céréale', 'picture' => 'baguette_pain.jpeg']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::INGREDIENTS as $ingredient) {
            $newIngredient = new Ingredient();
            $newIngredient->setNameIngredient($ingredient['nameIngredient']);
            $newIngredient->setPicture($ingredient['picture']);
            $manager->persist($newIngredient);
            $this->addReference('ingredient_' . $ingredient['nameIngredient'], $newIngredient);
        }

        $manager->flush();
    }
}
