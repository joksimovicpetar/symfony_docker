<?php

namespace App\Repository;

use App\Entity\ExtraIngridient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExtraIngridient>
 *
 * @method ExtraIngridient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtraIngridient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtraIngridient[]    findAll()
 * @method ExtraIngridient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraIngridientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtraIngridient::class);
    }

    public function save(ExtraIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ExtraIngridient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(ExtraIngridient $entity)
    {
        $this->getEntityManager()->flush();
    }

//    /**
//     * @return ExtraIngridient[] Returns an array of ExtraIngridient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExtraIngridient
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
