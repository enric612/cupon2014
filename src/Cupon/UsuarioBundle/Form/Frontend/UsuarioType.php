<?php
namespace Cupon\UsuarioBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('email', 'email',  array('label' => 'Correo electrónico', 'attr' => array(
                'placeholder' => 'usuario@servidor'
            )))

            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'first_options'   => array('label' => 'Contraseña'),
                'second_options'  => array('label' => 'Repite Contraseña'),
                'required'        => false
            ))

            ->add('direccion')
            ->add('permite_email', 'checkbox', array('required' => false))
            ->add('fecha_nacimiento', 'birthday', array(
                'years' => range(date('Y') - 18, date('Y') - 18 - 120)
            ))
            ->add('dni')
            ->add('numero_tarjeta', 'text', array('label' => 'Tarjeta de Crédito', 'attr' => array(
                'pattern'     => '^[0-9]{13,16}$',
                'placeholder' => 'Entre 13 y 16 numeros'
            )))

            ->add('ciudad', 'entity', array(
                'class'         => 'Cupon\\CiudadBundle\\Entity\\Ciudad',
                'empty_value'   => 'Selecciona una ciudad',
                'query_builder' => function(EntityRepository $repositorio) {
                    return $repositorio->createQueryBuilder('c')
                        ->orderBy('c.nombre', 'ASC');
                },
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cupon\UsuarioBundle\Entity\Usuario',
            'validation_groups' => array('default', 'registro'),
            ));
    }

    public function getName()
    {
        return 'cupon_usuariobundle_usuariotype';
    }

}