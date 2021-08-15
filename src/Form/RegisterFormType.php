<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'registerEmail input'
                ],
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('firstName', TextType::class, [
                'attr' => [
                    'class' => 'registerFirst input'
                ],
                'label' => 'Jméno',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'class' => 'registerLast input'
                ],
                'label' => 'Přijmení',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('repeat', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => "Hesla se neshodují.",
                'options' => [
                    'attr' => [
                        'class' => 'registerPasswdRepeat input'
                    ],
                ],
                'required' => true,
                'first_options' => [
                    'label' => "Heslo",
                    'label_attr' => [
                        'class' => 'label'
                    ]
                ],
                'second_options' => [
                    'label' => "Heslo znovu",
                    'label_attr' => [
                        'class' => 'label'
                    ]
                ],
                'mapped' => false
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'button is-link'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
