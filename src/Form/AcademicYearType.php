<?php

namespace App\Form;

use App\Entity\AcademicYear;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcademicYearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('academicyear')

            ->add('academicyear',EntityType::class,array("class"=>"App\Entity\AcademicYear",
                'query_builder' => function(EntityRepository $er)  {
                    return $er->createQueryBuilder('a')
                        ->where('a.state= :state')
                        ->setParameter('state', 1)




                        ;
                },
                "choice_label"=>"academicyear","label"=>"      Année Academique   : ",
                'placeholder' => '--Sélectionner l\'Année Académique--'))


        ;


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AcademicYear::class,
        ]);
    }
}
