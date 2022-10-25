<?php

namespace App\Repository;

use App\Entity\ExtraIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExtraIngredient>
 *
 * @method ExtraIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtraIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtraIngredient[]    findAll()
 * @method ExtraIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtraIngredient::class);
    }

    public function save(ExtraIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ExtraIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(ExtraIngredient $entity)
    {
        $this->getEntityManager()->flush();
    }

    public function findExtraIngredients()
    {


        return $this->createQueryBuilder('extra_ingredient')

            ->orderBy('extra_ingredient.id', 'ASC')
            ->getQuery()
            ->getResult();


    }

//    /**
//     * @return ExtraIngredient[] Returns an array of ExtraIngredient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExtraIngredient
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
