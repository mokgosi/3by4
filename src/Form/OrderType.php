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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
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
        // $formModifier = function (FormInterface $form, Country $country = null) {
        //     $kits = null === $country ? [] : $country->getAvailableKits();
        //     $form->add('kit', EntityType::class,[
        //     'class' => Kit::class,
        //     'placeholder' => '',
        //     'choices' => $kits
        // ])
        // }
        // $builder->addEventListener(
        //     FormEvents::PRE_SET_DATA,
        //     function (FormEvent $event) use ($formModifier) {
        //         $data = $event->getData();
        //         $formModifier($event->getForm(), $data->getCountry());
        //     }
        // );
        // $builder->get('country')->addEventListener(
        //     FormEvents::POST_SUBMIT,
        //     function (FormEvent $event) use ($formModifier) {
        //         $country = $event->getForm()->getData();
        //         $formModifier($event->getForm()->getParent(), $country);
        //     }
        // );
        // $builder
        //     ->add('patient', PatientType::class)
        //     ->add('paid', CheckboxType::class,[])
        //     ->add('save', SubmitType::class, [])
        // ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderDTO::class,
        ]);
    }
}
