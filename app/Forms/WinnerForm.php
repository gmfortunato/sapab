<?php

namespace App\Forms;

use App\Models\Place;
use Kris\LaravelFormBuilder\Form;

class WinnerForm extends Form
{
    private function getPlacesOptions(){
        $places = Place::all();
        $placeOptions = [];
        foreach($places as $place){
            $placeOptions[$place->id.""] = $place->title . ' - ' . $place->city . '-' . $place->state;
        }
        return $placeOptions;
    }

    public function buildForm()
    {

        $this
            ->add('place_kina', 'select', [
                'label' => 'Ponto Credenciado - Kina',
                'empty_value' => 'Selecione o ponto credenciado',
                'choices' => $this->getPlacesOptions()
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
            ->add('return', 'button',['label' => 'Cancelar', 'attr' => ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin/lotteries"']]);
    }
}
