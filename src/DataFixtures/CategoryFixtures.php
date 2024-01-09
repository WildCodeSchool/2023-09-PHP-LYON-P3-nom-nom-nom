<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            'name' => 'Entrée',
        ],
        [
            'name' => 'Plat',
        ],
        [
            'name' => 'Dessert',
        ],
        [
            'name' => 'Apéritif',
        ],
        [
            'name' => 'Entremet',
        ],
        [
            'name' => 'Coktail',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $categoryFixture) {
            $category = new Category();
            $category->setName($categoryFixture['name']);
            $manager->persist($category);
            $this->addReference('category_' . $categoryFixture['name'], $category);
        }
        $manager->flush();
    }
}
