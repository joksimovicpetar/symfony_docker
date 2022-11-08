<?php

namespace App\Service;



use App\Entity\OrderInfo;
use App\Entity\UserOrder;
use App\Repository\OrderInfoRepository;
use App\Repository\UserOrderRepository;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserService
{
    private $repository;

    public function __construct(UserRepository $repository, UserOrderService $userOrderService, UserOrderRepository $userOrderRepository)
    {
        $this->repository = $repository;
        $this->userOrderService = $userOrderService;
        $this->userOrderRepository = $userOrderRepository;
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
        $password = $parameters['password'];
        $users = $this->repository->findAll();
        foreach ($users as $user){
            if ($user->getUsername()==$username){
                return new JsonResponse(["message"=>"error"],202);
            }
        }
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $this->repository->save($user);

    }

}