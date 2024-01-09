<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture implements DependentFixtureInterface
{
    public const STEPS = [
        ['description' => 'il faut préparer tout les ingrédients',
        'recipe' => 'recipe_Cassoulet Toulousain',
        'stepNumber' => 1],
        ['description' => 'il faut ensuite tout mettre dans la casserole qui est sur le feu',
        'recipe' => 'recipe_Cassoulet Toulousain',
        'stepNumber' => 2],
        ['description' => 'quand c\'est chaud, tu enlèves la casserole du feu et tu mets dans un plat pour servir',
        'recipe' => 'recipe_Cassoulet Toulousain',
        'stepNumber' => 3],
        ['description' => 'il faut mettre toutes les viandes autour d\'une broche',
        'recipe' => 'recipe_Donnër Kebab',
        'stepNumber' => 1],
        ['description' => 'il faut faire cuire la viande',
        'recipe' => 'recipe_Donnër Kebab',
        'stepNumber' => 2],
        ['description' => 'il faut la couper, la mettre dans le pain avec tomates, salade, oignons et servir',
        'recipe' => 'recipe_Donnër Kebab',
        'stepNumber' => 3],
        ['description' => 'il faut faire la pâte avec de l\'eau et de la farine',
        'recipe' => 'recipe_Gua Bao',
        'stepNumber' => 1],
        ['description' => 'il faut préparer la farce et la faire mariner',
        'recipe' => 'recipe_Gua Bao',
        'stepNumber' => 2],
        ['description' => 'il faut la faire cuire',
        'recipe' => 'recipe_Gua Bao',
        'stepNumber' => 3],
        ['description' => 'il faut mettre la farce et l\'oeuf dans la pâte et la fermer',
        'recipe' => 'recipe_Gua Bao',
        'stepNumber' => 4],
        ['description' => 'il faut faire cuire le bao à la vapeur pendant 20/25 minutes',
        'recipe' => 'recipe_Gua Bao',
        'stepNumber' => 5],
        ['description' => 'il faut faire la pâte avec de l\'eau et de la farine',
        'recipe' => 'recipe_sandwich au poulet',
        'stepNumber' => 1],
        ['description' => 'il faut faire cuire le pain. Quand la croute est dur et moelleuse, le sortir du four',
        'recipe' => 'recipe_sandwich au poulet',
        'stepNumber' => 2],
        ['description' => 'bien couper son filet de poulet et ses accompagnements',
        'recipe' => 'recipe_sandwich au poulet',
        'stepNumber' => 3],
        ['description' => 'mettre le tout dans le pain après l\'avoir ouvert',
        'recipe' => 'recipe_sandwich au poulet',
        'stepNumber' => 4],
        ['description' => 'assaissoner à votre goût',
        'recipe' => 'recipe_sandwich au poulet',
        'stepNumber' => 5],
        ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::STEPS as $stepFixture) {
            $step = new Step();
            $step->setDescription($stepFixture['description']);
            $step->setRecipe($this->getReference($stepFixture['recipe']));
            ;
            $step->setStepNumber($stepFixture['stepNumber']);

            $manager->persist($step);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RecipeFixture::class,
        ];
    }
}
