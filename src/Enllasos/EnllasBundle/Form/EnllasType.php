<?php

namespace Enllasos\EnllasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnllasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('link')
            ->add('privat')
            ->add('descripcio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Enllasos\EnllasBundle\Entity\Enllas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'enllasos_enllasbundle_enllas';
    }
}
