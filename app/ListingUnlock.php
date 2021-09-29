<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingUnlock extends Model
{
	protected $fillable = ['user_id','listing_id'];
    //
    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }
}
