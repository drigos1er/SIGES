<?php

namespace App\Form;

use App\Entity\SigesUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class)
            ->add('firstname',TextType::class)
            ->add('lastname',TextType::class)
            ->add('gender',choiceType::class,array('label'=>'Genre : ', 'choices' => array(
                '--selectionner le genre--' => '','M' => 'M','F'=>'F'),
                'attr' => array(
                    'class' =>'form-control'),'constraints' => array(
                    new NotBlank(),
                )))



            ->add('type',choiceType::class,array('label'=>' : ', 'choices' => array(
                '--selectionner le type --' => '','ENSEIGNANT' => 'ENSEIGNANT','ADMINISTRATIF DP'=>'ADMINISTRATIF DP','ADMINISTRATIF SG'=>'ADMINISTRATIF SG','INFORMATICIEN'=>'INFORMATICIEN'),
                'attr' => array(
                    'class' =>'form-control'),'constraints' => array(
                    new NotBlank(),
                )))

            ->add('phone', TextType::class)
            ->add('birthdate', DateType::class,array('label'=>'Date de naissance  : ','constraints' => array(
                new NotBlank(),
            ),'widget'=>'single_text','input'=>'datetime','format' => 'dd/MM/yyyy','attr' => [
                'class' => 'form-control input-inline datepicker',
                'data-provide' => 'datepicker',
                'placeholder' => 'Ex: 10/10/2010',

                'data-date-format' => 'dd/mm/yyyy'
            ]



            ))

            ->add('email', EmailType::class)
            ->add('title', TextType::class, [
                'required'=>false])
            ->add('speciality', TextType::class, [
                'required'=>false])
            ->add('discipline', TextType::class, [
                'required'=>false])
            ->add('up', TextType::class, [
                'required'=>false])
            ->add('picture', FileType::class, [
                'required'=>false])
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SigesUser::class,
        ]);
    }
}
