<?php

namespace App\ParamConverter;

use App\Entity\DataObjectQuantity;
use App\Entity\DataObjectRegistration;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\VarDumper\VarDumper;

class ParamConverterQuantity implements ParamConverterInterface
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer){
        $this->serializer = $serializer;
    }

    public function supports(ConfigurationInterface $configuration)
    {
        if ($configuration->getClass() != DataObjectQuantity::class ) {
            return false;
        }
        return true;
    }

    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        $class = $configuration->getClass();
        $object = $this->serializer->deserialize(
            $request->getContent(),
            $class,
            'json'
        );
        $request->attributes->set($configuration->getName(), $object);
    }

}