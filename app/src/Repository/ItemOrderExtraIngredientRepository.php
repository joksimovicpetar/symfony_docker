<?php

namespace App\Repository;

use App\Entity\ItemOrderExtraIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ItemOrderExtraIngredient>
 *
 * @method ItemOrderExtraIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrderExtraIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrderExtraIngredient[]    findAll()
 * @method ItemOrderExtraIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderExtraIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrderExtraIngredient::class);
    }

    public function save(ItemOrderExtraIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ItemOrderExtraIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findItemOrderExtraIngredient()
    {


        return $this->createQueryBuilder('itemOrderExtraIngredients')

            ->orderBy('itemOrderExtraIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();


    }

//    /**
//     * @return ItemOrderExtraIngredient[] Returns an array of ItemOrderExtraIngredient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ItemOrderExtraIngredient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
