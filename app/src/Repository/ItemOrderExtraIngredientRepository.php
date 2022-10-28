<?php

namespace App\Repository;

use App\Entity\ItemOrderExtraIngredient;
use App\Service\ExtraIngredientService;
use App\Service\ItemOrderExtraIngredientService;
use App\Service\ItemOrderService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @extends ServiceEntityRepository<ItemOrderExtraIngredient>
 *
 * @method ItemOrderExtraIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrderExtraIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrderExtraIngredient[]    findAll()
 * @method ItemOrderExtraIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderExtraIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrderExtraIngredient::class);
    }

    public function save(ItemOrderExtraIngredient $itemOrderExtraIngredient): void
    {
        $this->getEntityManager()->persist($itemOrderExtraIngredient);
        $this->getEntityManager()->flush();

    }

    public function deleteOnId(ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ItemOrderService $service): void
    {
        $current = $service->findItemOrderIdStatus();
        $itemOrderExtraIngredients = $itemOrderExtraIngredientService->findItemOrderExtraIngredient();

        foreach ($itemOrderExtraIngredients as $itemOrderExtraIngredient){
            if ($itemOrderExtraIngredient->getItemOrder()->getId() == $current->getId()){
                $this->getEntityManager()->remove($itemOrderExtraIngredient);
                $this->getEntityManager()->flush();
            }
        }
    }

    public function findItemOrderExtraIngredient()
    {
        return $this->createQueryBuilder('itemOrderExtraIngredients')
            ->orderBy('itemOrderExtraIngredients.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findLastItemOrderExtraIngredient()
    {
        return $this->createQueryBuilder('item_order_extra_ingredient')
            ->select('item_order_extra_ingredient')
            ->orderBy('item_order_extra_ingredient.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function updateExtraIngredient($extraIngredientId, ItemOrderService $service, ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ExtraIngredientService $extraIngredientService)
    {
        $extraIngredient = $extraIngredientService->find($extraIngredientId);
        $current = $service->findItemOrderIdStatus();
        $itemOrderExtraIngredient = new ItemOrderExtraIngredient($current,$extraIngredient);
        $current->setOrderStep(6);
        $itemOrderExtraIngredientService->save($itemOrderExtraIngredient);
    }

    public function update($parameters,ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ItemOrderService $service, ExtraIngredientService $extraIngredientService)
    {
        $extraIngredientsId = $parameters['valueId'];
        foreach ($extraIngredientsId as $extraIngredientId) {
            $itemOrderExtraIngredientService->updateExtraIngredient($extraIngredientId, $service, $itemOrderExtraIngredientService, $extraIngredientService);
        }
    }

//    /**
//     * @return ItemOrderExtraIngredient[] Returns an array of ItemOrderExtraIngredient objects
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

//    public function findOneBySomeField($value): ?ItemOrderExtraIngredient
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
