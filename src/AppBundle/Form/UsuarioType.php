<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UsuarioType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('lastName', TextType::class, array(
                    'label' => 'Apellidos',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('nombre', TextType::class, array(
                    'label' => 'Nombre',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('password', PasswordType::class, array(
                    'label' => 'Contraseña',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('correo', EmailType::class, array(
                    'label' => 'Correo electrónico',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('save', ResetType::class, array(
                    'attr' => array(
                        'class' => 'save',
                        'label' => 'Limpiar'),
                ))
                ->add('submit', SubmitType::class, array('label' => 'Registrar'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'backendbundle_usuario';
    }

}
