<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Place extends Model implements TableInterface
{
    protected $fillable = [
        'title', 'address', 'city', 'state',
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Ponto', 'Endereço', 'Cidade'];
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
            case 'Ponto':
                return $this->title;
            case 'Endereço':
                return $this->address;
            case 'Cidade':
                return $this->city . ' - ' . $this->state;
        }
    }
}
