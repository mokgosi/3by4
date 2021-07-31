<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Dto\OrderDTO;
use App\Entity\Kit;
use App\Entity\Order;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'placeholder' => ''
            ])
            ->add('kit', EntityType::class,[
                'class' => Kit::class,
                'placeholder' => ''
            ])
            ->add('patient', PatientType::class)
            ->add('paid', CheckboxType::class,[])
            ->add('save', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderDTO::class,
        ]);
    }
}
