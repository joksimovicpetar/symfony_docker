<?php

namespace App\Service;



use App\Entity\OrderInfo;
use App\Entity\UserOrder;
use App\Repository\OrderInfoRepository;
use App\Repository\UserOrderRepository;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use function PHPUnit\Framework\throwException;

class UserService
{
    private $repository;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserRepository $repository, UserOrderService $userOrderService, UserOrderRepository $userOrderRepository, UserPasswordHasherInterface $passwordHasher)
    {
        $this->repository = $repository;
        $this->userOrderService = $userOrderService;
        $this->userOrderRepository = $userOrderRepository;
        $this->passwordHasher = $passwordHasher;
    }

    function save($user)
    {
        $this->repository->save($user);
    }

    function update($user)
    {
        $this->repository->update($user);
    }

    function delete($user)
    {
        $this->repository->delete($user);
    }

    function find($id){
        return $this->repository->find($id);
    }

    function write($parameters){
        $username = $parameters['username'];
        $user = new User();
        $user->setUsername($username);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $parameters['password']
        );
//        $users = $this->repository->findAll();
//        foreach ($users as $user){
//            if ($user->getUsername()==$username){
//                return new JsonResponse(["message"=>"error"],202);
//            }
//        }

        $user->setPassword($hashedPassword);
        $this->repository->save($user);
    }

}