<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table='media';

    public function listing(){

        return $this->belongsTo('App\Listing');
    } 


}
