<?php

namespace App\Repository;

use App\Entity\OrderInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderInfo>
 *
 * @method OrderInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderInfo[]    findAll()
 * @method OrderInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderInfo::class);
    }

    public function save(OrderInfo $orderInfo): void
    {
        $this->getEntityManager()->persist($orderInfo);
        $this->getEntityManager()->flush();
    }

    public function remove(OrderInfo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
