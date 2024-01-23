<?php

namespace App\Tests\Unit;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RecipeTest extends KernelTestCase
{
    public function getRecipeFields(): Recipe
    {
        return (new Recipe())
            ->setNameRecipe('Tarte au potimaron')
            ->setDescription('La tarte au potimarron, c\'est trop bon')
            ->setCalorie(3000)
            ->setDate(new \DateTimeImmutable())
            ->setCookingTime(60)
            ->setPrepareTime(45)
            ->setPersonNumber(50);
    }
    public function testRecipeEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $recipe = $this->getRecipeFields();

        $errors = $container->get('validator')->validate($recipe);

        $this->assertCount(0, $errors);
    }

    public function testBlankNameRecipe(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $recipe = $this->getRecipeFields();

        $recipe->setNameRecipe('');

        $errors = $container->get('validator')->validate($recipe);

        $this->assertCount(1, $errors);
    }
}
