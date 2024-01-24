<?php

namespace App\Service;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use App\Entity\Recipe;

class ImageService extends AbstractController
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function verifyFileRecipePicture(Recipe $recipe): string
    {

        // Vérifie si le fichier existe dans public/build/images
        $imagePathBuild = '/build/images/' . $recipe->getPicture();
        $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
        '/public/' . $imagePathBuild);

        //Logique pour déterminer le chemin de l'image
        if ($imageExistsInBuild) {
            $imagePath = $imagePathBuild;
        } else {
            $imagePath = '/uploads/images/pictures/' . $recipe->getPicture();
        }
        return $imagePath;
    }

    public function verifyFilesRecipePictures(array $recipes): array
    {

        $imagePaths = [];

        foreach ($recipes as $recipe) {
            $imagePathBuild = '/build/images/' . $recipe->getPicture();
            $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathBuild);
            $imagePathUpload = '/uploads/images/pictures/' . $recipe->getPicture();
            $imageExistsInUpload = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathUpload);
            if ($imageExistsInBuild) {
                $imagePaths[] = $imagePathBuild;
            } elseif ($imageExistsInUpload) {
                $imagePaths[] = $imagePathUpload;
            } else {
                $imagePaths[] = 'pas d\'image';
            }
        }

        return $imagePaths;
    }

    public function verifyFilesRecipePictureIndex(array $recipes): array
    {
        $imagePaths = [];
        foreach ($recipes as $recipe) {
            // Vérfie que $recipe est une instance de Recipe
            if ($recipe instanceof Recipe) {
                $imagePathBuild = '/build/images/' . $recipe->getPicture();
                $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
                '/public/' . $imagePathBuild);
                if ($imageExistsInBuild) {
                    $imagePaths[$recipe->getId()] = $imagePathBuild;
                } else {
                    $imagePaths[$recipe->getId()] = '/uploads/images/pictures/' . $recipe->getPicture();
                }
            }
        }
            return $imagePaths;
    }

    public function verifyFilesCategoriesPictures(array $categories): array
    {

        $imagePaths = [];

        foreach ($categories as $category) {
            $imagePathBuild = '/build/images/' . $category->getPicture();
            $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathBuild);
            $imagePathUpload = '/uploads/images/pictures/' . $category->getPicture();
            $imageExistsInUpload = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathUpload);
            if ($imageExistsInBuild) {
                $imagePaths[] = $imagePathBuild;
            } elseif ($imageExistsInUpload) {
                $imagePaths[] = $imagePathUpload;
            } else {
                $imagePaths[] = 'pas d\'image';
            }
        }

        return $imagePaths;
    }
    public function verifyFilesIngredientsPictures(array $recipeIngredients): array
    {

        $imagePaths = [];

        foreach ($recipeIngredients as $recipeIngredient) {
            $imagePathBuild = '/build/images/' . $recipeIngredient->getIngredient()->getPicture();
            $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathBuild);
            $imagePathUpload = '/uploads/images/pictures/' . $recipeIngredient->getIngredient()->getPicture();
            $imageExistsInUpload = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
            '/public/' . $imagePathUpload);
            if ($imageExistsInBuild) {
                $imagePaths[] = $imagePathBuild;
            } elseif ($imageExistsInUpload) {
                $imagePaths[] = $imagePathUpload;
            } else {
                $imagePaths[] = 'pas d\'image';
            }
        }

        return $imagePaths;
    }
}
