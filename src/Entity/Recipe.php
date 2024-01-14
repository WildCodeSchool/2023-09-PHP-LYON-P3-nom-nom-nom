<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
#[UniqueEntity(
    fields: ['nameRecipe'],
    errorPath: 'nameRecipe',
    message: 'cette recette existe déjà',
)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    #[Assert\Length(
        max: 100,
        maxMessage: 'Le nom de la recette dépasse la taille maximum de {{ limit }} caractères',
    )]
    private ?string $nameRecipe = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $calorie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $date = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    #[Assert\PositiveOrZero(message: 'Un temps de cuisson ne peut pas être négatif')]

    private ?int $cookingTime = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    #[Assert\Positive(message: 'Un temps de préparation ne peut pas être négatif')]
    private ?int $prepareTime = null;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Step::class, orphanRemoval: true)]
    #[ORM\OrderBy(["stepNumber" => "ASC"])]
    private Collection $steps;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: RecipeIngredient::class, orphanRemoval: true)]
    private Collection $ingredients;


    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    #[Assert\Positive(message: 'La recette est pour combien de personne?')]
    private ?int $personNumber = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[Vich\UploadableField(mapping: 'picture_file', fileNameProperty: 'picture')]
    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
    )]
    private ?File $pictureFile = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?User $owner = null;
    #[ORM\ManyToOne(inversedBy: 'recipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'favoritelist')]
    private Collection $likers;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->steps = new ArrayCollection();
        $this->likers = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setDateValue(): void
    {
        $this->date = new DateTime('now');
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRecipe(): ?string
    {
        return $this->nameRecipe;
    }

    public function setNameRecipe(string $nameRecipe): static
    {
        $this->nameRecipe = ucfirst($nameRecipe);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = ucfirst($description);

        return $this;
    }

    public function getCalorie(): ?int
    {
        return $this->calorie;
    }

    public function setCalorie(?int $calorie): static
    {
        $this->calorie = $calorie;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cookingTime;
    }

    public function setCookingTime(int $cookingTime): static
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getPrepareTime(): ?int
    {
        return $this->prepareTime;
    }

    public function setPrepareTime(int $prepareTime): static
    {
        $this->prepareTime = $prepareTime;

        return $this;
    }

    public function getPersonNumber(): ?int
    {
        return $this->personNumber;
    }

    public function setPersonNumber(int $personNumber): static
    {
        $this->personNumber = $personNumber;

        return $this;
    }
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): Recipe
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return Collection<int, RecipeIngredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(RecipeIngredient $ingredient): static
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients->add($ingredient);
            $ingredient->setRecipe($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, Step>
     */
    public function getSteps(): Collection
    {
        return $this->steps;
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

    public function setPictureFile(File $image = null): Recipe
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

    public function addStep(Step $step): static
    {
        if (!$this->steps->contains($step)) {
            $this->steps->add($step);
            $step->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(RecipeIngredient $ingredient): static
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecipe() === $this) {
                $ingredient->setRecipe(null);
            }
        }
        return $this;
    }

    public function removeStep(Step $step): static
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getRecipe() === $this) {
                $step->setRecipe(null);
            }
        }
        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;
        return $this;
    }

        /**
     * @return Collection<int, User>
     */
    public function getLikers(): Collection
    {
        return $this->likers;
    }

    public function addLiker(User $user): self
    {
        if (!$this->likers->contains($user)) {
            $this->likers->add($user);
            $user->addToFavoritelist($this);
        }

        return $this;
    }

    public function removeLiker(User $user): self
    {
        if ($this->likers->removeElement($user)) {
            $user->removeFromFavoritelist($this);
        }

        return $this;
    }
}
