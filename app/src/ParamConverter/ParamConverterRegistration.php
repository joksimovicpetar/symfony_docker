<?php

namespace App\ParamConverter;

use App\Entity\DataObjectRegistration;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\VarDumper\VarDumper;

class ParamConverterRegistration implements ParamConverterInterface
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer){
        $this->serializer = $serializer;
    }

    public function supports(ConfigurationInterface $configuration)
    {
//        VarDumper::dump($configuration->getClass());exit;

        if ($configuration->getClass() != DataObjectRegistration::class ) {
//            VarDumper::dump('nije');exit;
            return false;
        }
//        VarDumper::dump('usao');exit;

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
//        VarDumper::dump($object);exit;
        $request->attributes->set($configuration->getName(), $object);
    }

}