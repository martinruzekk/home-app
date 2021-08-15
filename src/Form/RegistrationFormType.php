<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'input'
                ],
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Souhlas s podmínkami',
                    ]),
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'input'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Musíte vyplnit heslo',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Heslo musí být dlouhé alepoň {{ limit }} znaků',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Heslo',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('passwordRepeat', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'input'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Musíte vyplnit heslo',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Heslo musí mít alespoň 6 zaků',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Heslo znovu',
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
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'button is-link']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
