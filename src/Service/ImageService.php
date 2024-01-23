<?php

namespace App\Service;

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

        // Vérifier si le fichier existe dans public/build/images
        $imagePathBuild = '/build/images/' . $recipe->getPicture();
        $imageExistsInBuild = $this->filesystem->exists($this->getParameter('kernel.project_dir') .
        '/public/' . $imagePathBuild);

        // Votre logique pour déterminer le chemin de l'image
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
}
