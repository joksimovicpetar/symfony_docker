<?php

namespace App\Repository;

use App\Entity\ItemOrderIngredient;
use App\Service\IngredientService;
use App\Service\ItemOrderIngredientService;
use App\Service\ItemOrderService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

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

    public function deleteOnId($id, ItemOrderIngredientService $itemOrderIngredientService): void
    {
        $itemOrderIngredients = $itemOrderIngredientService->findItemOrderIngredient();

        foreach ($itemOrderIngredients as $itemOrderIngredient){
            if ($itemOrderIngredient->getItemOrder()->getId() == $id){
                $this->getEntityManager()->remove($itemOrderIngredient);
                $this->getEntityManager()->flush();
            }
        }
    }

    public function findItemOrderIngredient()
    {
        return $this->createQueryBuilder('itemOrderIngredients')

            ->orderBy('itemOrderIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function updateIngredient($ingredientId, ItemOrderService $service, ItemOrderIngredientService $itemOrderIngredientService, IngredientService $ingredientService)
    {
        $ingredient = $ingredientService->find($ingredientId);
//        VarDumper::dump($ingredient);exit;
        $current = $service->findItemOrderIdStatus();
//        VarDumper::dump($current);exit;
        $itemOrderIngredient = new ItemOrderIngredient($current,$ingredient);
//        VarDumper::dump($itemOrderIngredient);exit;
        $current->setOrderStep(5);
        $itemOrderIngredientService->save($itemOrderIngredient);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
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
