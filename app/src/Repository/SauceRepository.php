<?php

namespace App\Repository;

use App\Entity\Sauce;
use App\Service\ItemOrderService;
use App\Service\SauceService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sauce>
 *
 * @method Sauce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sauce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sauce[]    findAll()
 * @method Sauce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SauceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sauce::class);
    }

    public function save(Sauce $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sauce $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(Sauce $entity)
    {
        $this->getEntityManager()->flush();
    }

    public function findSauces()
    {
        return $this->createQueryBuilder('sauce')
            ->orderBy('sauce.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function updateSauce($parameters, ItemOrderService $service, SauceService $sauceService)
    {
        $sauce = $sauceService->find($parameters['valueId']);
        $current = $service->findItemOrderIdStatus();

        $current->setSauce($sauce);
        $current->setOrderStep(4);

        $service->save($current);
    }

//    /**
//     * @return Sauce[] Returns an array of Sauce objects
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

//    public function findOneBySomeField($value): ?Sauce
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
