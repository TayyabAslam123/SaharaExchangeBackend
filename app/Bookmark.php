<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }
}
