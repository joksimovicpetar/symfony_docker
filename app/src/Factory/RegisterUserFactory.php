<?php

namespace App\Factory;

use App\Entity\User;

class RegisterUserFactory
{

    public static function registerUserFromParams($parameters){
        $user = new User();
        $username = $parameters['username'];
        $user->setUsername($username);
        $name = $parameters['name'];
        $user->setName($name);
        $address = $parameters['address'];
        $user->setAddress($address);
        $phone = $parameters['phone'];
        $user->setPhone($phone);

        return $user;

    }
}