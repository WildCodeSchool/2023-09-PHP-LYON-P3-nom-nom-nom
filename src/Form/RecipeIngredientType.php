<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\RecipeIngredient;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
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
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('i')
                        ->orderBy('i.nameIngredient', 'ASC');
                },
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
                    'pièce(s)' => 'pièce(s)',
                    'gramme(s)' => 'g',
                    'kilogramme(s)' => 'kg',
                    'pincée(s)' => 'pincée(s)',
                    'tranche(s)' => 'tranche(s)',
                    'feuille(s)' => 'feuille(s)',
                    'brin(s)' => 'brin(s)',
                    'cuillère(s) à soupe' => 'c.a.s',
                    'cuillère(s) à café' => 'c.a.c'
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
