<?php

namespace App\Service;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RenumberStepsService extends AbstractController
{
    public function renumberSteps(Recipe $recipe): void
    {
        $steps = $recipe->getSteps();
        $stepNumber = 1;

        foreach ($steps as $step) {
            $step->setStepNumber($stepNumber++);
        }
    }
}
