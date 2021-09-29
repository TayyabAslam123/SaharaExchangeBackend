<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table='industry';

    public function listing()
    {
        return $this->hasone('App\Listing');
    }


}
