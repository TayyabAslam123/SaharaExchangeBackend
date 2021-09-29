<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingMonetization extends Model
{
    protected $table='listing_monetizations';


    public function listing_monetization()
    {
        return $this->belongsTo('App\Monetization','monetization_id');
    }
}
