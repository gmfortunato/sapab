<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');

        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255',
                'error_messages' => [
                    'name.required' => 'O campo nome é obrigatório!',
                ],
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => "required|max:255|unique:users,email,{$id}",
                'error_messages' => [
                    'email.required' => 'O campo e-mail é obrigatório!'
                ]
            ])
            ->add('password', 'password', [
                'label' => 'Senha',
                'rules' => 'required',
                'error_messages' => [
                    'password.required' => 'O campo senha é obrigatório!'
                ]
            ])
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/users"']]);

    }
}
