<?php

namespace App\Repository;

use App\Entity\Recipe;
use App\Entity\Step;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Step>
 *
 * @method Step|null find($id, $lockMode = null, $lockVersion = null)
 * @method Step|null findOneBy(array $criteria, array $orderBy = null)
 * @method Step[]    findAll()
 * @method Step[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Step::class);
    }

    public function findLastStepNumberForRecipe(Recipe $recipe): ?int
    {
        return $this->createQueryBuilder('s')
            ->select('MAX(s.stepNumber)')
            ->andWhere('s.recipe = :recipe')
            ->setParameter('recipe', $recipe)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
