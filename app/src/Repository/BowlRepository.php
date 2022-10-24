<?php

namespace App\Repository;

use App\Entity\Bowl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bowl>
 *
 * @method Bowl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bowl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bowl[]    findAll()
 * @method Bowl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BowlRepository extends ServiceEntityRepository
{


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bowl::class);
    }

    public function save(Bowl $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Bowl $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(Bowl $entity)
    {
        $this->getEntityManager()->flush();
    }

    public function findBowls()
    {


        return $this->createQueryBuilder('bowl')

            ->select('bowl', 'i')
            ->leftJoin('bowl.image', 'i')
            ->orderBy('bowl.id', 'ASC')
            ->getQuery()
            ->getResult();


    }


//    /**
//     * @return Bowl[] Returns an array of Bowl objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bowl
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
