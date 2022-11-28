<?php

namespace App\Repository;

use App\Entity\Bowl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\VarDumper\VarDumper;

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

    public function findSaltyBowls($offset, $page)
    {
        $firstResult = ($page-1)*$offset;
        return $this->createQueryBuilder('bowl')

            ->select('bowl', 'i', 'category')
            ->leftJoin('bowl.image', 'i')
            ->leftJoin('bowl.category', 'category')
            ->orderBy('bowl.id', 'ASC')
            ->setParameter('category_check', 'Salty')
            ->where('category.name LIKE :category_check')
            ->setFirstResult(0)
            ->setMaxResults($offset)
            ->getQuery()
            ->getResult();
    }
}
