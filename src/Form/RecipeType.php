<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'label' => 'Télecharger une photo illustrant votre recette '
            ])
            ->add('nameRecipe', TextType::class, [
                'label' => 'Nom de la recette : '
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Un commentaire sur votre recette ? '
            ])
            ->add('calorie', NumberType::class, [
                'label' => 'Nombre de calories : '
            ])
            ->add('date', HiddenType::class)
            ->add('cookingTime', NumberType::class, [
                'label' => 'Temps de cuisson : '
            ])
            ->add('prepareTime', NumberType::class, [
                'label' => 'Temps de préparation : '
            ])
            ->add('personNumber', NumberType::class, [
                'label' => 'Pour combien de personne ? '
            ])
            ->add('steps', CollectionType::class, [
                'entry_type' => StepType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'label' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
