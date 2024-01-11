<?php

namespace App\Service;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpdateNumberService extends AbstractController
{
    public function updateStepsNumber(Recipe $recipe): void
    {
        $steps = $recipe->getSteps();
        $stepNumber = 1;

        foreach ($steps as $step) {
            $step->setStepNumber($stepNumber++);
        }
    }
}
