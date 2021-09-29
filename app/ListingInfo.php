<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingInfo extends Model
{
	protected $fillable = ['id','key','listing_id'];
    //
    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }
}
