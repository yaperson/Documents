<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class TableChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('table_number', ChoiceType::class, [
            'choices'  => [
                '0' => null,
                '1' => true,
                '2' => false,
                '3' => false,
                '4' => false,
                '5' => false,
                '6' => false,
                '7' => false,
                '8' => false,
                '9' => false,
                '10' => false,
            ],
        ])
        //->add('ling_count', ChoiceType::class)
        ->add('line_count', IntegerType::class)
        ->add('color', ColorType::class);
        // $builder->add('table_number', IntegerType::class, [
        //     'attr' => ['style' => "width: 35px;"],
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
