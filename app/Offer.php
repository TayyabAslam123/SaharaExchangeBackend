<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	protected $fillable = ['listing_id','buyer_id'];
    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }

    public function user()
    {
    	return $this->belongsTo(User::class,'buyer_id');
    }

}
