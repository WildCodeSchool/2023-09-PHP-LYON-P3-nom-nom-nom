<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
        $count = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $count;
    }
}
