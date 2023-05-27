<?php

namespace App\Form;

use App\Entity\Proveedor;
use App\Repository\ProveedorRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class ProveedorAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Proveedor::class,
            'placeholder' => 'Choose a Proveedor',
            //'choice_label' => 'name',

            'query_builder' => function(ProveedorRepository $proveedorRepository) {
                return $proveedorRepository->createQueryBuilder('proveedor');
            },
            //'security' => 'ROLE_SOMETHING',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
