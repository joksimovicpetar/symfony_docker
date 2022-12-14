<?php

namespace App\ParamConverter;

use App\Entity\DataObject;
use App\Entity\DataObjectCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\VarDumper\VarDumper;

class SerializedMultipleParamConverter implements ParamConverterInterface
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer){
        $this->serializer = $serializer;
    }

    public function supports(ConfigurationInterface $configuration)
    {
        if ($configuration->getClass() != DataObjectCollection::class ) {

            return false;
        }

        return true;
    }

    public function apply(Request $request, ConfigurationInterface $configuration)
    {

        $object = $this->serializer->deserialize(
            $request->getContent(),
            DataObjectCollection::class,
            'json'
        );
//        VarDumper::dump($object);exit;

        $request->attributes->set($configuration->getName(), $object);


    }

}