<?php

namespace App\Forms;

use App\Models\Place;
use Kris\LaravelFormBuilder\Form;

class LotteryForm extends Form
{

    private function getResultNumbers(){
        $resultNumbers = [];

        for($n = 1; $n <= 90; $n++){
            if($n < 10){
                $resultNumbers[$n.""] = "0" . $n;
            }else{
                $resultNumbers[$n.""] = $n;
            }

        }
        return $resultNumbers;
    }

    private function getPlacesOptions(){
        $places = Place::all();
        $placeOptions = [];
        foreach($places as $place){
            $placeOptions[$place->id.""] = $place->title . ' - ' . $place->city . '-' . $place->state;
        }
        return $placeOptions;
    }

    private function getTimesOptions(){
        $timeOptions = [];
        for($t = 8; $t <= 20; $t++){
            $timeOptions[$t.":00"] = $t."h00";
        }
        return $timeOptions;
    }

    public function buildForm()
    {

        $this
            ->add('date', 'date', [
                'label' => 'Data do sorteio',
                'rules' => 'required',
                'error_messages' => [
                    'date.required' => 'O campo data do sorteio é obrigatório!',
                ],
            ])
            ->add('time', 'select', [
                'label' => 'Horário do sorteio',
                'rules' => 'required',
                'empty_value' => 'Selecione o horário do sorteio',
                'choices' => $this->getTimesOptions(),
            ])
            ->add('number', 'text', [
                'label' => 'Número do sorteio',
                'rules' => 'required',
                'empty_value' => 'O número do sorteio é obrigatório',
            ])
            ->add('kina', 'text', [
                'label' => 'Premiações - Kina',
                'rules' => 'required',
                'empty_value' => 'O valor do prêmio é obrigatório',
            ])
            ->add('keno', 'text', [
                'label' => 'Premiações - Keno',
                'rules' => 'required',
                'empty_value' => 'O valor do prêmio é obrigatório',
            ])
            ->add('price', 'text', [
                'label' => 'Valor do cupom',
                'rules' => 'required',
                'empty_value' => 'O valor do cupom é obrigatório',
            ])
            ->add('place_kina', 'select', [
                'label' => 'Ponto Credenciado - Kina',
                'empty_value' => 'Selecione o ponto credenciado',
                'choices' => $this->getPlacesOptions(),
            ])
            ->add('card_kina', 'text', [
                'label' => 'Cupom Premiado - Kina',
            ])
            ->add('place_keno', 'select', [
                'label' => 'Ponto Credenciado - Keno',
                'empty_value' => 'Selecione o ponto credenciado',
                'choices' => $this->getPlacesOptions()
            ])
            ->add('card_keno', 'text', [
                'label' => 'Cupom Premiado - Keno',
            ])
            ->add('results', 'choice', [
                'label' => 'Números sorteados',
                'choices' => $this->getResultNumbers(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'expanded' => true,
                'multiple' => true
            ])
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/lotteries"']]);
    }
}
