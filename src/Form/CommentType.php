<?php

namespace App\Form;

use App\Entity\Comment;
// use App\Entity\Recipe;
// use App\Entity\user;
// use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TypeTextType::class, [
                'label' => 'Votre commentaire'
            ])
            ->add('note', TypeTextType::class, [
                'label' => 'Notez la recette (sur 5)'
            ])
            ->add('commentator', null, ['choice_label' => 'pseudo',])
            // ->add('recipe', null, ['choice_label' => 'name_recipe',])
            ->add('Publiez', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
