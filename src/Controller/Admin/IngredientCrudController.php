<?php

namespace App\Controller\Admin;

use App\Entity\Ingredient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingredient::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nameIngredient'),
            TextField::new('category'),
            BooleanField::new('isAllergen'),
            ImageField::new('picture')->setBasePath('build/images/')
            ->onlyOnIndex(),
            ImageField::new('picture')->setUploadDir('assets/images/')
            ->onlyOnForms(),
            ImageField::new('picture')->setBasePath('uploads/images/')
            ->onlyOnForms(),
        ];
    }
}
