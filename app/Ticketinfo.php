<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketinfo extends Model
{
    protected $table='ticket_info';
    
    public $timestamps = false;

    public function support()
    {
    	return $this->belongsTo('App\Support');
    }
}
