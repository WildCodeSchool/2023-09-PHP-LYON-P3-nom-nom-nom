<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use DateTimeInterface;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[Vich\Uploadable]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    private ?string $nameIngredient = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    private ?string $category = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAllergen = null;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: RecipeIngredient::class, orphanRemoval: true)]
    private Collection $recipes;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[Vich\UploadableField(mapping: 'picture_file', fileNameProperty: 'picture')]
    #[Assert\File(
        maxSize: '3M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
    )]
    private ?File $pictureFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameIngredient(): ?string
    {
        return $this->nameIngredient;
    }

    public function setNameIngredient(string $nameIngredient): static
    {
        $this->nameIngredient = ucfirst($nameIngredient);

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function isIsAllergen(): ?bool
    {
        return $this->isAllergen;
    }

    public function setIsAllergen(?bool $isAllergen): static
    {
        $this->isAllergen = $isAllergen;

        return $this;
    }

    /**
     * @return Collection<int, RecipeIngredient>
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(RecipeIngredient $recipe): static
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->setIngredient($this);
        }

        return $this;
    }

    public function removeRecipe(RecipeIngredient $recipe): static
    {
        if ($this->recipes->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getIngredient() === $this) {
                $recipe->setIngredient(null);
            }
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function setPictureFile(File $image = null): Ingredient
    {
        $this->pictureFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): Ingredient
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
