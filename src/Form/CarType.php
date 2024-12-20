<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('month_price', TextType::class, [
                'attr' => [
                    'class' => 'js-price',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d+,\d{2}$/',
                        'message' => 'Veuillez entrer un prix valide avec deux chiffres après la virgule.',
                    ])
                ],
                'label' => 'Prix mensuel'
            ])
            ->add('day_price', TextType::class, [
                'attr' => [
                    'class' => 'js-price',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d+,\d{2}$/',
                        'message' => 'Veuillez entrer un prix valide avec deux chiffres après la virgule.',
                    ])
                ],
                'label' => 'Prix journalier'
            ])
            ->add('gearbox', ChoiceType::class, [
                'choices' => [
                    'Automatique' => 'automatic',
                    'Manuelle' => 'manual'
                ],
                'label' => 'Boite de vitesse',
            ])
            ->add('places', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'min' => 1,
                    'max' => 9,
                    'step' => 1,
                    'value' => 5,
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
