<?php

namespace App\Repository;

use App\Entity\ItemOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ItemOrder>
 *
 * @method ItemOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrder[]    findAll()
 * @method ItemOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrder::class);
    }

    public function save(ItemOrder $itemOrder): void
    {
        $this->getEntityManager()->persist($itemOrder);
        $this->getEntityManager()->flush();

    }

    public function delete(ItemOrder $itemOrder): void
    {
        $this->getEntityManager()->remove($itemOrder);
        $this->getEntityManager()->flush();
    }

    public function findItemOrderIdStatus()
    {
        return $this->createQueryBuilder('item_order')
            ->select('item_order')
            ->orderBy('item_order.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    public function calculatePrice()
//    {
//        $pri
//    }

//    /**
//     * @return ItemOrder[] Returns an array of ItemOrder objects
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

//    public function findOneBySomeField($value): ?ItemOrder
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
