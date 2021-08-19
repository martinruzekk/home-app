<?php

namespace App\Form;

use App\Entity\Item;
use App\Repository\CompanyRepository;
use App\Repository\ItemTypeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddItemType extends AbstractType
{
    private $allCompanies = [];
    private $allItemTypes = [];

    public function __construct(CompanyRepository $companyRepository, ItemTypeRepository $itemTypeRepository)
    {
        foreach ($companyRepository->findAll() as $company) {
            $this->allCompanies[$company->getName()] = $company->getName();
        }

        foreach ($itemTypeRepository->findAll() as $type) {
            $this->allItemTypes[$type->getName()] = $type->getName();
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'input'
                ],
                'label' => 'Název',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'textarea'
                ],
                'label' => 'Popis',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('ammount', NumberType::class, [
                'attr' => [
                    'class' => 'input'
                ],
                'label' => 'Počet',
                'label_attr' => [
                    'class' => 'label'
                ]
            ])
            ->add('item_type', ChoiceType::class, [
                'attr' => [],
                'label' => 'Typ položky',
                'label_attr' => [
                    'class' => 'label'
                ],
                'choices' => $this->allItemTypes,
                'mapped' => false
            ])
            ->add('company', ChoiceType::class, [
                'attr' => [],
                'label' => 'Výrobce',
                'label_attr' => [
                    'class' => 'label'
                ],
                'choices' => $this->allCompanies,
                'mapped' => false
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'button is-success'
                ],
                'label' => 'Přidat'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
