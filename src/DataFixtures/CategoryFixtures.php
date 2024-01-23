<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
    public const CATEGORIES = [
        [
            'name' => 'Entrées',
            'picture' => 'entree.png',
        ],
        [
            'name' => 'Plats',
            'picture' => 'plat.png',
        ],
        [
            'name' => 'Desserts',
            'picture' => 'dessert.png',
        ],
        [
            'name' => 'Apéritifs',
            'picture' => 'aperitif.png',
        ],
        [
            'name' => 'Entremets',
            'picture' => 'entremet.png',
        ],
        [
            'name' => 'Cocktails',
            'picture' => 'cocktail.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $categoryFixture) {
            $category = new Category();
            $category->setName($categoryFixture['name']);
            $slug = $this->slugger->slug($categoryFixture['name']);
            $category->setSlug($slug);
            $category->setPicture($categoryFixture['picture']);
            $manager->persist($category);
            $this->addReference('category_' . $categoryFixture['name'], $category);
        }
        $manager->flush();
    }
}
