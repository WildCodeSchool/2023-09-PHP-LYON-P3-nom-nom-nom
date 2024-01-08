<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\RecipeIngredient;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ingredient', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'nameIngredient',
                'placeholder' => 'choisissez un ingredient',
                'autocomplete' => true,
                'label' => 'Ingrédient',
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Quantité',

            ])
            ->add('unity', ChoiceType::class, [
                'choices' => [
                    'choisissez une unité' => '',
                    'millilitre(s)' => 'ml',
                    'centilitre(s)' => 'cl',
                    'décilitre(s)' => 'dl',
                    'litre(s)' => 'l',
                    'pièce(s)' => 'pie',
                    'gramme(s)' => 'g',
                    'kilogramme(s)' => 'kg',
                    'pincée(s)' => 'pin',
                    'tranche(s)' => 't',
                    'feuille(s)' => 'f',
                    'brin(s)' => 'b',
                    'cuillère(s) à soupe' => 'cas',
                    'cuillère(s) à café' => 'cac'
                ],
                'autocomplete' => true,
                'label' => 'Unité',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecipeIngredient::class,
        ]);
    }
}
