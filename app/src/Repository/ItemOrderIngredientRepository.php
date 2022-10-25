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

    public function save(ItemOrderIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ItemOrderIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findItemOrderIngredient()
    {


        return $this->createQueryBuilder('itemOrderIngredients')

            ->orderBy('itemOrderIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();


    }



//    /**
//     * @return ItemOrderIngredient[] Returns an array of ItemOrderIngredient objects
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

//    public function findOneBySomeField($value): ?ItemOrderIngredient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
