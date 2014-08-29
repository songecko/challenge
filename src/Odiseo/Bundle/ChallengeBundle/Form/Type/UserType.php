<?php

namespace Odiseo\Bundle\ChallengeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre Challenge'
        ))
        ->add('videoUrl', 'text', array(
        		'required' => true,
        		'label'    => 'Video Url'
        ))
        ->add('challengedBy', 'entity', array(
        		'required' => true,
        		'class'    => 'OdiseoChallengeBundle:User',
        		'label'    => 'Desafiado por'
        ));
    }

    public function getName()
    {
        return 'odiseo_challenge_user';
    }
}
