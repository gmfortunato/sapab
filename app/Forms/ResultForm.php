<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ResultForm extends Form
{
    public function buildForm()
    {
        $this

            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/lotteries"']]);
    }
}
