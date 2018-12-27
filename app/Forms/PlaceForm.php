<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PlacesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => 'Ponto',
                'rules' => 'required|max:255',
                'error_messages' => [
                    'title.required' => 'O campo nome do ponto é obrigatório!',
                ],
            ])
            ->add('address', 'text', [
                'label' => 'Endereço',
                'rules' => 'required|max:255',
                'error_messages' => [
                    'address.required' => 'O campo endereço é obrigatório!',
                ],
            ])
            ->add('city', 'text', [
                'label' => 'Cidade',
                'rules' => 'required|max:255',
                'error_messages' => [
                    'city.required' => 'O campo cidade é obrigatório!',
                ],
            ])
            ->add('state', 'text', [
                'label' => 'Estado',
                'rules' => 'required|max:2',
                'error_messages' => [
                    'state.required' => 'O campo estado é obrigatório!',
                ],
            ]);
    }
}
