<?php

namespace App\Repository;

use App\Entity\ItemOrderExtraIngridient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ItemOrderExtraIngridient>
 *
 * @method ItemOrderExtraIngridient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrderExtraIngridient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrderExtraIngridient[]    findAll()
 * @method ItemOrderExtraIngridient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderExtraIngridientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrderExtraIngridient::class);
    }

    public function save(ItemOrderExtraIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ItemOrderExtraIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findItemOrderExtraIngridient()
    {


        return $this->createQueryBuilder('itemOrderExtraIngridients')

            ->orderBy('itemOrderExtraIngridients.id', 'ASC')
            ->getQuery()
            ->getResult();


    }

//    /**
//     * @return ItemOrderExtraIngridient[] Returns an array of ItemOrderExtraIngridient objects
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

//    public function findOneBySomeField($value): ?ItemOrderExtraIngridient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
