<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public const INGREDIENTS = [
        ['nameIngredient' => 'Carotte', 'picture' => 'carotte.png'],
        ['nameIngredient' => 'Oignon', 'picture' => 'oignon.png'],
        ['nameIngredient' => 'Tomate', 'picture' => 'tomate.png'],
        ['nameIngredient' => 'Salade', 'picture' => 'laitue.jpeg'],
        ['nameIngredient' => 'Saucisse de Toulouse', 'picture' => 'saucissedetoulouse.png'],
        ['nameIngredient' => 'Echine de porc', 'picture' => 'echinedeporc.jpeg'],
        ['nameIngredient' => 'Filet de porc', 'picture' => 'filetdeporc.jpeg'],
        ['nameIngredient' => 'Escalope de poulet', 'picture' => 'escalopedepoulet.jpeg'],
        ['nameIngredient' => 'Pain Bao', 'picture' => 'bao.webp'],
        ['nameIngredient' => 'Pain Kebab', 'picture' => 'pain-kebab.jpg'],
        ['nameIngredient' => 'Haricot blanc', 'picture' => 'haricotblanc.jpeg'],
        ['nameIngredient' => 'Cacahuète', 'picture' => 'cacahuètes.jpeg'],
        ['nameIngredient' => 'Huile d\'olive', 'picture' => 'huileolive.jpeg'],
        ['nameIngredient' => 'Thym', 'picture' => 'thym.jpeg'],
        ['nameIngredient' => 'Nuoc-mâm', 'picture' => 'nuoc-mam.jpeg'],
        ['nameIngredient' => 'Pain', 'picture' => 'baguette_pain.jpeg'],
        ['nameIngredient' => 'Abricot', 'picture' => 'abricot.png'],
        ['nameIngredient' => 'Artichaut', 'picture' => 'artichaut.png'],
        ['nameIngredient' => 'Aubergine', 'picture' => 'aubergine.png'],
        ['nameIngredient' => 'Avocat', 'picture' => 'avocat.png'],
        ['nameIngredient' => 'Beurre', 'picture' => 'beurre.png'],
        ['nameIngredient' => 'Cerise', 'picture' => 'cerise.png'],
        ['nameIngredient' => 'Champignon', 'picture' => 'champignon.png'],
        ['nameIngredient' => 'Chocolat', 'picture' => 'chocolat.png'],
        ['nameIngredient' => 'Choufleur', 'picture' => 'choufleur.png'],
        ['nameIngredient' => 'Citron', 'picture' => 'citron.png'],
        ['nameIngredient' => 'Concombre', 'picture' => 'concombre.png'],
        ['nameIngredient' => 'Courge', 'picture' => 'courge.png'],
        ['nameIngredient' => 'Crevette', 'picture' => 'crevette.png'],
        ['nameIngredient' => 'Epinards', 'picture' => 'epinards.png'],
        ['nameIngredient' => 'Farine', 'picture' => 'farine.png'],
        ['nameIngredient' => 'Fenouil','category' => 'Fruit', 'picture' => 'fenouil.png'],
        ['nameIngredient' => 'Fraise','category' => 'Fruit', 'picture' => 'fraise.png'],
        ['nameIngredient' => 'Framboise', 'picture' => 'framboise.png'],
        ['nameIngredient' => 'Haricot-vert', 'picture' => 'haricotvert.png'],
        ['nameIngredient' => 'Kiwi', 'picture' => 'kiwi.png'],
        ['nameIngredient' => 'Lait', 'picture' => 'lait.png'],
        ['nameIngredient' => 'Mangue', 'picture' => 'mangue.png'],
        ['nameIngredient' => 'Mozzarella', 'picture' => 'mozzarella.png'],
        ['nameIngredient' => 'Myrtille', 'picture' => 'myrtille.png'],
        ['nameIngredient' => 'Orange', 'picture' => 'orange.png'],
        ['nameIngredient' => 'Poire', 'picture' => 'poire.png'],
        ['nameIngredient' => 'Poireau', 'picture' => 'poireau.png'],
        ['nameIngredient' => 'Poivron', 'picture' => 'poivron.png'],
        ['nameIngredient' => 'Pomme', 'picture' => 'pomme.png'],
        ['nameIngredient' => 'Pomme de terre', 'picture' => 'pommedeterre.png'],
        ['nameIngredient' => 'Sucre', 'picture' => 'sucre.png'],
        ['nameIngredient' => 'Sucre brun', 'picture' => 'sucrebrun.png'],
        ['nameIngredient' => 'Thon', 'picture' => 'thon.png'],
        ['nameIngredient' => 'Yaourt', 'picture' => 'yaourt.png'],
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
