<?php

namespace App\Form;

use App\Entity\InputForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('House_Address')
            ->add('arrivalDate')
            ->add('lengthOfVisit')
            ->add('AmountOfPeople')
            ->add('reserve',SubmitType::class, ['attr' => ['class' =>'save']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InputForm::class,
        ]);
    }
}
