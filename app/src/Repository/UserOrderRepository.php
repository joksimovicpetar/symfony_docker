<?php

namespace App\Repository;

use App\Entity\UserOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;

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
    public function __construct(ManagerRegistry $registry, Security $security)
    {
        parent::__construct($registry, UserOrder::class);
        $this->security = $security;
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
        $user = $this->security->getUser();
        $userIdentifier = $user->getId();
        return $this->createQueryBuilder('user_order')

            ->select('user_order', 'item', 'bowl', 'size', 'base', 'sauce', 'ingredients', 'extraIngredients')
            ->leftJoin('user_order.itemOrders', 'item')
            ->leftJoin('user_order.user', 'user')
            ->leftJoin('item.bowl', 'bowl')
            ->leftJoin('item.size', 'size')
            ->leftJoin('item.base', 'base')
            ->leftJoin('item.sauce', 'sauce')
            ->leftJoin('item.itemOrderIngredients', 'ingredients')
            ->leftJoin('item.itemOrderExtraIngredients', 'extraIngredients')
            ->orderBy('user_order.id', 'ASC')
            ->setParameter('in_progress','in_progress')
            ->setParameter('user_check',$userIdentifier)
            ->where('user_order.status LIKE :in_progress')
            ->andWhere('user.id LIKE :user_check')
            ->getQuery()
            ->getOneOrNullResult();
    }



    public function findLastUserOrder()
    {
        $user = $this->security->getUser();
        $userIdentifier = $user->getId();

        return $this->createQueryBuilder('user_order')
            ->select('user_order','user')
            ->leftJoin('user_order.user', 'user')
            ->orderBy('user_order.id', 'DESC')
            ->setParameter('user_check', $userIdentifier)
            ->where('user.id LIKE :user_check')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
