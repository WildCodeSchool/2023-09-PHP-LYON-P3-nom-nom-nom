<?php

namespace App\Tests\Unit;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RecipeTest extends KernelTestCase
{
    public function testRecipeEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $recipe = new Recipe();
        $recipe->setNameRecipe('Tarte au potimaron');
        $recipe->setDescription('La tarte au potimarron, c\'est trop bon');
        $recipe->setCalorie(3000);
        $recipe->setDate(new \DateTimeImmutable());
        $recipe->setCookingTime(60);
        $recipe->setPrepareTime(45);
        $recipe->setPersonNumber(50);
        $errors = $container->get('validator')->validate($recipe);

        $this->assertCount(0, $errors);
    }
}
