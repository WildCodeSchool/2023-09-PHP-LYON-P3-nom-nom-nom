<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
            IdField::new('id')
            ->onlyOnIndex(),
            TextField::new('nameRecipe'),
            NumberField::new('calorie'),
            NumberField::new('personNumber'),
            ImageField::new('picture')->setBasePath('build/images/')
            ->onlyOnIndex(),
            TextField::new('description')
            ->onlyWhenUpdating(),
            NumberField::new('prepareTime')
            ->onlyWhenUpdating(),
            NumberField::new('cookingTime')
            ->onlyWhenUpdating(),
            CollectionField::new('steps')
            ->onlyWhenUpdating(),
            CollectionField::new('ingredients')
            ->onlyWhenUpdating(),

        ];
    }
}
