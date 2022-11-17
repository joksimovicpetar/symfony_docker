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

    public function findItemOrderIdStatus($userIdentifier)
    {
        return $this->createQueryBuilder('item_order')
            ->select('item_order','itemIngredients', 'itemExtraIngredients', 'ingredients', 'extraIngredients')
            ->leftJoin('item_order.userOrder', 'userOrder')
            ->leftJoin('userOrder.user', 'user')
            ->leftJoin('item_order.itemOrderIngredients', 'itemIngredients')
            ->leftJoin('item_order.itemOrderExtraIngredients', 'itemExtraIngredients')
            ->leftJoin('itemIngredients.ingredient', 'ingredients')
            ->leftJoin('itemExtraIngredients.extraIngredient', 'extraIngredients')
            ->orderBy('item_order.id', 'DESC')
            ->setParameter('user_check', $userIdentifier)
            ->where('user.id LIKE :user_check')
            ->andWhere('item_order.orderStep != 6')

            ->getQuery()
            ->getOneOrNullResult();
    }
}
