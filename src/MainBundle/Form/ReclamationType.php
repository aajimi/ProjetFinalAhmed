<?php
/**
 * Created by PhpStorm.
 * User: bghanem
 * Date: 19/07/2019
 * Time: 13:03
 */

namespace MainBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sujet')->add('dateReclamation')->add('flagTraite');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Reclamation'
        ));
    }

    public function getBlockPrefix()
    {
        return 'mainbundle_reclamationcovoiturage';
    }
}