<?php

namespace App\Repository;

use App\Entity\ItemOrderIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<ItemOrderIngredient>
 *
 * @method ItemOrderIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrderIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrderIngredient[]    findAll()
 * @method ItemOrderIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrderIngredient::class);
    }

    public function save(ItemOrderIngredient $itemOrderIngredient): void
    {
        $this->getEntityManager()->persist($itemOrderIngredient);
        $this->getEntityManager()->flush();
    }

    public function delete(ItemOrderIngredient $itemOrderIngredient): void
    {
        $this->getEntityManager()->remove($itemOrderIngredient);
        $this->getEntityManager()->flush();

    }

    public function findItemOrderIngredient()
    {
        return $this->createQueryBuilder('itemOrderIngredients')

            ->orderBy('itemOrderIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
