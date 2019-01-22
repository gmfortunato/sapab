<?php

namespace App\Forms;

use App\Models\Place;
use Kris\LaravelFormBuilder\Form;

class LotteryForm extends Form
{

    private function getSelectedNumbers(){
        $selectedNumbers = [];

        if(!empty($this->getModel())) {
            $selectedNumbers = $this->getModel()->results;
        }

        return $selectedNumbers;

    }

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
        //$time = $this->getModel()->time;

        $timeOptions = [];
        for($t = 8; $t <= 20; $t++){
            if($t < 10) {
                $timeOptions["0" . $t . ":00:00"] = $t . "h00";
            }else{
                $timeOptions[$t . ":00:00"] = $t . "h00";
            }
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
                'rules' => 'required|min:4|max:4',
                'empty_value' => 'O número do sorteio é obrigatório',
            ])
            ->add('kina', 'text', [
                'attr' => ['data-mask' => '000.000,00', 'data-mask-reverse' => 'true'],
                'label' => 'Premiações - Kina',
                'rules' => 'required',
                'empty_value' => 'O valor do prêmio é obrigatório',
            ])
            ->add('keno', 'text', [
                'attr' => ['data-mask' => '000.000,00', 'data-mask-reverse' => 'true'],
                'label' => 'Premiações - Keno',
                'rules' => 'required',
                'empty_value' => 'O valor do prêmio é obrigatório',
            ])
            ->add('price', 'text', [
                'attr' => ['data-mask' => '000.000,00', 'data-mask-reverse' => 'true'],
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
                'selected' => $this->getSelectedNumbers(),
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
