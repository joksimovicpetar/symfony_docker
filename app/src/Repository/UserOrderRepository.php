<?php

namespace App\Repository;

use App\Entity\UserOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserOrder>
 *
 * @method UserOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserOrder[]    findAll()
 * @method UserOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserOrder::class);
    }

    public function save(UserOrder $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(UserOrder $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findUserOrders()
    {
        return $this->createQueryBuilder('user_order')

            ->select('user_order', 'item', 'bowl', 'size', 'base', 'sauce', 'ingredients', 'extraIngredients')
            ->leftJoin('user_order.itemOrders', 'item')
            ->leftJoin('item.bowl', 'bowl')
            ->leftJoin('item.size', 'size')
            ->leftJoin('item.base', 'base')
            ->leftJoin('item.sauce', 'sauce')
            ->leftJoin('item.itemOrderIngredients', 'ingredients')
            ->leftJoin('item.itemOrderExtraIngredients', 'extraIngredients')
            ->orderBy('user_order.id', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findLastUserOrder()
    {
        return $this->createQueryBuilder('user_order')
            ->select('user_order')
            ->orderBy('user_order.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return UserOrder[] Returns an array of UserOrder objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserOrder
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
