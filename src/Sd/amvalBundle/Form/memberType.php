<?php

namespace Sd\amvalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class memberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fn')
            ->add('ln')
            ->add('birthdate')
            ->add('age')
            ->add('address')
            ->add('phone')
            ->add('pic')
            ->add('manager')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sd\amvalBundle\Entity\member'
        ));
    }

    public function getName()
    {
        return 'sd_amvalbundle_membertype';
    }
}
