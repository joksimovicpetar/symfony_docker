<?php

namespace App\Form;

use App\Entity\ItemOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('orderStep')
            ->add('bowlId')
            ->add('sizeId')
            ->add('baseId')
            ->add('sauceId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemOrder::class,
        ]);
    }
}
