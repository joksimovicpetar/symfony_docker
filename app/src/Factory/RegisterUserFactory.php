<?php

namespace App\Factory;

use App\Entity\User;

class RegisterUserFactory
{

    public static function registerUserFromParams($dataObjectRegistration){
        $user = new User();
        $user->setUsername($dataObjectRegistration->getUsername());
        $user->setName($dataObjectRegistration->getName());
        $user->setAddress($dataObjectRegistration->getAddress());
        $user->setPhone($dataObjectRegistration->getPhone());

        return $user;

    }
}