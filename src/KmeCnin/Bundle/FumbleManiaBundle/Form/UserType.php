<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array(
            'label' => 'default.label.title',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'         => 'KmeCnin\Bundle\FumbleManiaBundle\Entity\Campaign',
            'intention'          => 'campaign',
            'translation_domain' => 'KmeCninFumbleManiaBundle'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
