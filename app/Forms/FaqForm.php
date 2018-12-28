<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FaqForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255',
                'error_messages' => [
                    'title.required' => 'O campo título é obrigatório!',
                ],
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'required',
                'error_messages' => [
                    'description.required' => 'O campo descrição é obrigatório!',
                ],
            ])
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/faqs"']]);
    }
}
