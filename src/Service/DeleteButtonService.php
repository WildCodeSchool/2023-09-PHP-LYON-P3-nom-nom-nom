<?php

namespace App\Service;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteButtonService extends AbstractController
{
    //permet de supprimer l'ingrédient si son état est "null" après soumission du formulaire
    public function deleteIngredients(Recipe $recipe): void
    {
        foreach ($recipe->getIngredients() as $ingredient) {
            if ($ingredient->getQuantity() === null) {
                $recipe->removeIngredient($ingredient);
            }
        }
    }
    //permet de supprimer l'étape' si son état est "null" après soumission du formulaire
    public function deleteSteps(Recipe $recipe): void
    {
        foreach ($recipe->getSteps() as $step) {
            if ($step->getStepNumber() === null) {
                $recipe->removeStep($step);
            }
        }
    }
}
