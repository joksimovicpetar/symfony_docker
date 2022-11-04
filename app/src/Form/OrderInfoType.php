<?php

namespace App\Form;

use App\Entity\OrderInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName')
            ->add('address')
            ->add('phoneNumber')
            ->add('deliveryTime')
            ->add('payment')
            ->add('orderDate')
            ->add('note')
            ->add('userOrderId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OrderInfo::class,
        ]);
    }
}
