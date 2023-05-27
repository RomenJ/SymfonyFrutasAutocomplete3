<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Repository\ClienteRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class ClienteAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Cliente::class,
            'placeholder' => 'Seleccione un cliente Cliente',
            //'choice_label' => 'name',

            'query_builder' => function(ClienteRepository $clienteRepository) {
                return $clienteRepository->createQueryBuilder('cliente');
            },
            //'security' => 'ROLE_SOMETHING',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
