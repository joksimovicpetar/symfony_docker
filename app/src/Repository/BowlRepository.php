<?php

namespace App\Repository;

use App\Entity\Bowl;
use App\Entity\ItemOrder;
use App\Service\BowlService;
use App\Service\ItemOrderService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

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

    public function updateBowl($parameters, ItemOrderService $service, BowlService $bowlService)
    {
        $bowl = $bowlService->find($parameters['valueId']);
        $current = $service ->findItemOrderIdStatus();

        if ($current == null || $current->getOrderStep()==6) {
            $itemOrder = new ItemOrder();
            $itemOrder->setBowl($bowl);
            $itemOrder->setOrderStep(1);
            $service->save($itemOrder);

            $response = new Response();
            $response->setStatusCode(Response::HTTP_OK);
            $response->send();
        } else {
            $current->setBowl($bowl);
            $current->setOrderStep(1);
            $service->save($current);

            $response = new Response();
            $response->setStatusCode(Response::HTTP_OK);
            $response->send();
        }
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
