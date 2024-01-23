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

    public function testTooLongNameRecipe(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $recipe = $this->getRecipeFields();

        $recipe->setNameRecipe('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Mauris ex quam, rutrum vel venenatis et, sollicitudin eget nisl. Mauris vel rutrum massa.
        Morbi mattis, leo vel faucibus imperdiet, lorem neque rhoncus turpis, ac hendrerit augue tortor a justo.
        Ut eu neque urna. Duis ultricies non nulla tincidunt interdum.
        Donec dapibus, tellus id sollicitudin mollis, risus ante iaculis turpis, at ultrices leo nulla in nulla.
        In hac habitasse platea dictumst. Sed eget felis sagittis, suscipit ante at, laoreet neque.
        Morbi placerat felis sit amet felis lacinia consequat.
        Quisque metus enim, consequat scelerisque dapibus at, dictum eget sapien.
        Praesent justo nulla, sodales quis.');

        $errors = $container->get('validator')->validate($recipe);

        $this->assertCount(1, $errors);
    }
}
