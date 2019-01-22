<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model implements TableInterface
{
    protected $casts = [
        'results' => 'array'
    ];

    protected $fillable = [
        'date', 'time', 'number', 'kina', 'keno', 'price', 'place_kina', 'place_keno', 'card_kina', 'card_keno', 'results'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Data', 'Horário', 'Número do Sorteio', 'Premiações - Kina', 'Premiações - Keno', 'Resultados'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
            case 'Data':
                return date('d/m/Y', $this->date);
            case 'Horário':
                return preg_replace(':', 'h', date('H:i', $this->time));
            case 'Número do Sorteio':
                return $this->number;
            case 'Premiações - Kina':
                return 'R$ ' . number_format($this->kina, 2, ',', '.');
            case 'Premiações - Keno':
                return 'R$ ' . number_format($this->keno, 2, ',', '.');
        }
    }

    public function placeKina(){
        return $this->belongsTo(Place::class,'place_kina');
    }

    public function placeKeno(){
        return $this->belongsTo(Place::class,'place_keno');
    }

}
