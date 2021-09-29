<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monetization extends Model
{
    public function listing()
    {
        return $this->hasMany(ListingMonetization::class,'monetization_id');
    }

}
