<?php

namespace App\Repository;

use App\Entity\ItemOrderIngridient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ItemOrderIngridient>
 *
 * @method ItemOrderIngridient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrderIngridient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrderIngridient[]    findAll()
 * @method ItemOrderIngridient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderIngridientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrderIngridient::class);
    }

    public function save(ItemOrderIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ItemOrderIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findItemOrderIngridient()
    {


        return $this->createQueryBuilder('itemOrderIngridients')

            ->orderBy('itemOrderIngridients.id', 'ASC')
            ->getQuery()
            ->getResult();


    }



//    /**
//     * @return ItemOrderIngridient[] Returns an array of ItemOrderIngridient objects
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

//    public function findOneBySomeField($value): ?ItemOrderIngridient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
