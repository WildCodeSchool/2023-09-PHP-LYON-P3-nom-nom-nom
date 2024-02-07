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
        ['nameIngredient' => 'Pain','category' => 'Céréale', 'picture' => 'baguette_pain.jpeg'],
        ['nameIngredient' => 'Abricot','category' => 'Fruit', 'picture' => 'abricot.png'],
        ['nameIngredient' => 'Artichaut','category' => 'Fruit', 'picture' => 'artichaut.png'],
        ['nameIngredient' => 'Aubergine','category' => 'Fruit', 'picture' => 'aubergine.png'],
        ['nameIngredient' => 'Avocat','category' => 'Fruit', 'picture' => 'avocat.png'],
        ['nameIngredient' => 'Beurre','category' => 'Fruit', 'picture' => 'beurre.png'],
        ['nameIngredient' => 'Cerise','category' => 'Fruit', 'picture' => 'cerise.png'],
        ['nameIngredient' => 'Champignon','category' => 'Fruit', 'picture' => 'champignon.png'],
        ['nameIngredient' => 'Chocolat','category' => 'Fruit', 'picture' => 'chocolat.png'],
        ['nameIngredient' => 'Choufleur','category' => 'Fruit', 'picture' => 'choufleur.png'],
        ['nameIngredient' => 'Citron','category' => 'Fruit', 'picture' => 'citron.png'],
        ['nameIngredient' => 'Concombre','category' => 'Fruit', 'picture' => 'concombre.png'],
        ['nameIngredient' => 'Courge','category' => 'Fruit', 'picture' => 'courge.png'],
        ['nameIngredient' => 'Crevette','category' => 'Fruit', 'picture' => 'crevette.png'],
        ['nameIngredient' => 'Epinards','category' => 'Fruit', 'picture' => 'epinards.png'],
        ['nameIngredient' => 'Farine','category' => 'Fruit', 'picture' => 'farine.png'],
        ['nameIngredient' => 'Fenouil','category' => 'Fruit', 'picture' => 'fenouil.png'],
        ['nameIngredient' => 'Fraise','category' => 'Fruit', 'picture' => 'fraise.png'],
        ['nameIngredient' => 'Framboise','category' => 'Fruit', 'picture' => 'framboise.png'],
        ['nameIngredient' => 'Haricot-vert','category' => 'Fruit', 'picture' => 'haricotvert.png'],
        ['nameIngredient' => 'Kiwi','category' => 'Fruit', 'picture' => 'kiwi.png'],
        ['nameIngredient' => 'Lait','category' => 'Fruit', 'picture' => 'lait.png'],
        ['nameIngredient' => 'Mangue','category' => 'Fruit', 'picture' => 'mangue.png'],
        ['nameIngredient' => 'Mozzarella','category' => 'Fruit', 'picture' => 'mozzarella.png'],
        ['nameIngredient' => 'Myrtille','category' => 'Fruit', 'picture' => 'myrtille.png'],
        ['nameIngredient' => 'Orange','category' => 'Fruit', 'picture' => 'orange.png'],
        ['nameIngredient' => 'Poire','category' => 'Fruit', 'picture' => 'poire.png'],
        ['nameIngredient' => 'Poireau','category' => 'Fruit', 'picture' => 'poireau.png'],
        ['nameIngredient' => 'Poivron','category' => 'Fruit', 'picture' => 'poivron.png'],
        ['nameIngredient' => 'Pomme','category' => 'Fruit', 'picture' => 'pomme.png'],
        ['nameIngredient' => 'Pomme de terre','category' => 'Fruit', 'picture' => 'pommedeterre.png'],
        ['nameIngredient' => 'Sucre','category' => 'Fruit', 'picture' => 'sucre.png'],
        ['nameIngredient' => 'Sucre brun','category' => 'Fruit', 'picture' => 'sucrebrun.png'],
        ['nameIngredient' => 'Thon','category' => 'Fruit', 'picture' => 'thon.png'],
        ['nameIngredient' => 'Yaourt','category' => 'Fruit', 'picture' => 'yaourt.png'],
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
