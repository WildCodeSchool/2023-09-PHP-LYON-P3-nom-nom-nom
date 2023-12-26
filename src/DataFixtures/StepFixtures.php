<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture
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
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 1],
        ['description' => 'il faut préparer la farce et la faire mariner',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 2],
        ['description' => 'il faut la faire cuire',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 3],
        ['description' => 'il faut mettre la farce et l\'oeuf dans la pâte et la fermer',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 4],
        ['description' => 'il faut faire cuire le bao à la vapeur pendant 20/25 minutes',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 5],
        ['description' => 'on les sert avec de la bonne sauce',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 7],
        ['description' => 'quand ils sont chaud on les enlève',
        'recipe' => 'recipe_Gua Bao2',
        'stepNumber' => 6],

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
}
