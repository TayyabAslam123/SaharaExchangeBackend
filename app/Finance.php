<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table='finances';

    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }
}
