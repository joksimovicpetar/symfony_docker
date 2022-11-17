<?php

namespace App\Extension;


use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CurrentUserExtension extends AbstractExtension
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_user', [$this, 'findCurrentUser']),
        ];
    }

    public function findCurrentUser() : \Symfony\Component\Security\Core\User\UserInterface

    {
        return $this->security->getUser();

    }

}
