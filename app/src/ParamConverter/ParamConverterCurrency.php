<?php

namespace App\ParamConverter;

use App\Entity\DataObject;
use App\Entity\DataObjectCurrency;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\VarDumper\VarDumper;

class ParamConverterCurrency implements ParamConverterInterface
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer){
        $this->serializer = $serializer;
    }

    public function supports(ConfigurationInterface $configuration)
    {

        if ($configuration->getClass() != DataObjectCurrency::class ) {
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