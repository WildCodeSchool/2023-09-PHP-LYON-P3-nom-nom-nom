<?php

namespace App\Entity;

use App\Repository\StepRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StepRepository::class)]
class Step
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    #[ORM\JoinColumn(nullable: true)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    private ?Recipe $recipe = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message: 'Ne me laisse pas tout vide')]
    #[Assert\Positive(message: 'Le numéro d\'étape ne peut pas être négatif')]
    private ?int $stepNumber = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): static
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getStepNumber(): ?int
    {
        return $this->stepNumber;
    }

    public function setStepNumber(?int $stepNumber): static
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
