<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 *
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function findLikeNameRecipe(string $nameRecipe): array
    {
        // cette fonction est utilisé pour la recherche des recettes.
        //Elle recherche les recettes en fonction du nom, description et ingrédient
        $result = [];

        if (!empty($nameRecipe)) {
            $result = $this->createQueryBuilder('r')
                ->join('r.ingredients', 'ri')
                ->join('ri.ingredient', 'i')
                ->andWhere('r.nameRecipe LIKE :nameRecipe')
                ->orWhere('r.description LIKE :nameRecipe')
                ->orWhere('i.nameIngredient LIKE :nameRecipe')
                ->setParameter('nameRecipe', '%' . $nameRecipe . '%')
                ->orderBy('r.nameRecipe', 'ASC')
                ->getQuery()
                ->getResult();
        }

        return $result;
    }

    public function countRecipes(): int
    {
        //cette fonction compte toutes les recettes
        $count = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $count;
    }

    public function countRecipeByCat(Category $category): int
    {
        //cette fonction compte les recettes par categorie
        $countByCategory = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->andWhere('r.category = :category')
            ->setParameter('category', $category)
            ->getQuery()
            ->getSingleScalarResult();

            return $countByCategory;
    }
}
