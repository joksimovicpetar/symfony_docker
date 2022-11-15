<?php

namespace App\Repository;

use App\Entity\ItemOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;

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
    public function __construct(ManagerRegistry $registry, Security $security)
    {
        parent::__construct($registry, ItemOrder::class);
        $this->security = $security;
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

//    public function findItemOrderIdStatus()
//    {
//        $user = $this->security->getUser();
//        $userIdentifier = $user->getId();
//
//        return $this->createQueryBuilder('item_order')
//            ->select('item_order')
//            ->leftJoin('item_order.userOrder', 'userOrder')
//            ->leftJoin('userOrder.user', 'user')
//            ->leftJoin('item_order.itemOrderIngredients', 'ingredients')
//            ->leftJoin('item_order.itemOrderExtraIngredients', 'extraIngredients')
//            ->orderBy('userOrder.id', 'DESC')
//            ->setParameter('user_check',$userIdentifier)
//            ->where('user.id LIKE :user_check')
//            ->andWhere('item_order.orderStep != 6')
//
//            ->getQuery()
//            ->getOneOrNullResult();
//    }

    public function findItemOrderIdStatus()
    {
        $token = $this->security->getToken();
        $user = $token ? $token->getUser() : null;

//        $user = $this->security->getUser();
        $userIdentifier = $user->getId();

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
