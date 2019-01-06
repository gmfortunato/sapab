<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PlaceForm extends Form
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
                'rules' => 'max:255',
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
            ])
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/places"']]);
    }
}
