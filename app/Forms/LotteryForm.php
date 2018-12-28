<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class LotteryForm extends Form
{
    public function buildForm()
    {
        $places = Place::all();

        $this
            ->add('date', 'date', [
                'label' => 'Data do sorteio',
                'rules' => 'required',
                'error_messages' => [
                    'date.required' => 'O campo data do sorteio é obrigatório!',
                ],
            ])
            ->add('time', 'text', [
                'label' => 'Hora do sorteio',
                'rules' => 'required',
                'error_messages' => [
                    'time.required' => 'O campo hora do sorteio é obrigatório!',
                ],
            ])
            ->add('number', 'text', [
                'label' => 'Número do sorteio',
            ])
            ->add('kina', 'text', [
                'label' => 'Premiações - Kina',
            ])
            ->add('keno', 'text', [
                'label' => 'Premiações - Keno',
            ])
            ->add('price', 'text', [
                'label' => 'Valor do cupom',
            ])
            ->add('place_kina', 'select', [
                'label' => 'Ponto Credenciado - Kina',
                'choices' => [
                    foreach($places as $place)
                    {{ $place->id}} => {{ $place->name}},
                    endforeach
                    ],
                'empty_value' => '=== Selecione o ponto credenciado ==='
            ])
            ->add('card_kina', 'text', [
                'label' => 'Cupom Premiado - Kina',
            ])
            ->add('place_keno', 'select', [
                'label' => 'Ponto Credenciado - Keno',
                'choices' => [
                    foreach($places as $place)
                    {{ $place->id}} => {{ $place->name}},
                    endforeach
                    ],
                'empty_value' => '=== Selecione o ponto credenciado ==='
            ])
            ->add('card_keno', 'text', [
                'label' => 'Cupom Premiado - Keno',
            ])
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/lotteries"']]);
    }
}
