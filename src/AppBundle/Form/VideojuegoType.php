<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class VideojuegoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('nombrejuego', TextType::class, array(
                    'label' => 'Nombre del Videojuego',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('lenguajes', TextType::class, array(
                    'label' => 'Lenguaje',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
//                       ->add('lenguajes', ChoiceType::class, array(
//                    'choices' => array(
//                        'Ingles' => 'en',
//                        'Español' => 'es',
//                        'Aleman' => 'muppets',
//                        'Chino' => 'arr',
//                    )
//                ))
                ->add('sipnosis', TextareaType::class, array(
                    'label' => 'Sinopsis',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
//                ->add('imagen', TextType::class, array(
//                    'label' => 'Imagen',
//                    'attr' => array(
//                        'class' => 'form-control',
//                        'requiered' => true
//                    )
//                ))
                ->add('precioventa', NumberType::class, array(
                    'label' => 'Precio',
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('idClasificacion', EntityType::class, array(
                    'label' => 'Clasificación',
                    'placeholder' => 'Selecciona una clasificación',
                    'class' => 'BackendBundle:Clasificacion',
                    'choice_label' => 'clasificacionjuego',
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('idClasificaciondeTipo', EntityType::class, array(
                    'label' => 'Objetivo',
                    'placeholder' => 'Selecciona el objetivo del juego',
                    'class' => 'BackendBundle:Clasificaciondetipo',
                    'choice_label' => 'tipojuego',
                    'expanded' => false,
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'requiered' => true
                    )
                ))
                ->add('submit', SubmitType::class, array('label' => 'Registrar'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Videojuego'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_videojuego';
    }


}
