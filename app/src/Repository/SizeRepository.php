<?php

namespace App\Repository;

use App\Entity\Size;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Service\ItemOrderService;
use App\Service\SizeService;

/**
 * @extends ServiceEntityRepository<Size>
 *
 * @method Size|null find($id, $lockMode = null, $lockVersion = null)
 * @method Size|null findOneBy(array $criteria, array $orderBy = null)
 * @method Size[]    findAll()
 * @method Size[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Size::class);
    }

    public function save(Size $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Size $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(Size $entity)
    {
        $this->getEntityManager()->flush();
    }

    public function findSizes()
    {
        return $this->createQueryBuilder('size')
            ->orderBy('size.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function updateSize($parameters, ItemOrderService $service, SizeService $sizeService)
    {
        $size = $sizeService->find($parameters['valueId']);
        $current = $service->findItemOrderIdStatus();

        $current->setSize($size);
        $current->setOrderStep(2);

        $service->save($current);
    }

//    /**
//     * @return Size[] Returns an array of Size objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Size
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
