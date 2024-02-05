<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use App\Form\IngredientType;
use App\Form\RecipeIngredientType;
use App\Form\StepType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameRecipe'),
            NumberField::new('calorie'),
            NumberField::new('personNumber'),
            ImageField::new('picture')->setBasePath('uploads/images/pictures/')
            ->setUploadDir('public/uploads/images/pictures'),
            TextField::new('description')
            ->onlyOnForms(),
            NumberField::new('prepareTime')
            ->onlyOnForms(),
            NumberField::new('cookingTime')
            ->onlyOnForms(),
            CollectionField::new('steps')
            ->onlyOnForms()
            ->setEntryType(StepType::class),
            CollectionField::new('ingredients')
            ->onlyOnForms()
            ->setEntryType(RecipeIngredientType::class),

        ];
    }
}
