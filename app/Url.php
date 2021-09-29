<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table='urls';
    
    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }
}
