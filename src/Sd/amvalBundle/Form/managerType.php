<?php

namespace Sd\amvalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class managerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fn')
            ->add('ln')
            ->add('codemelli',null,array('max_length' => 10))
            ->add('address','textarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sd\amvalBundle\Entity\manager'
        ));
    }

    public function getName()
    {
        return 'sd_amvalbundle_managertype';
    }
}
