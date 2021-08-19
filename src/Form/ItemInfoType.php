<?php

namespace App\Form;

use App\Entity\ItemInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('purchase_date', DateTimeType::class, [])
            ->add('expiration_date', DateTimeType::class, [])
            ->add('last_used', DateTimeType::class, [])
            ->add('purchase_price', NumberType::class, [])
            ->add('item', TextType::class, [
                'mapped' => false
            ])
            ->add('retailer', TextType::class, [
                'mapped' => false
            ])
            ->add('inventory_location', TextType::class, [
                'mapped' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ItemInfo::class,
            'autocomplete' => 'off'
        ]);
    }
}
