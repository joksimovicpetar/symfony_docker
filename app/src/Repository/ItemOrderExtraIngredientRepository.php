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

    public function save(ItemOrderExtraIngredient $itemOrderExtraIngredient): void
    {
        $this->getEntityManager()->persist($itemOrderExtraIngredient);
        $this->getEntityManager()->flush();

    }

    public function delete(ItemOrderExtraIngredient $itemOrderExtraIngredient): void
    {
        $this->getEntityManager()->remove($itemOrderExtraIngredient);
        $this->getEntityManager()->flush();

    }

    public function findItemOrderExtraIngredient()
    {
        return $this->createQueryBuilder('itemOrderExtraIngredients')
            ->orderBy('itemOrderExtraIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findLastItemOrderExtraIngredient()
    {
        return $this->createQueryBuilder('item_order_extra_ingredient')
            ->select('item_order_extra_ingredient')
            ->orderBy('item_order_extra_ingredient.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
