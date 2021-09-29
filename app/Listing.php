<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //finances of a listing
    public function finance()
    {
        return $this->hasone('App\Finance');
    }

  //monetization's of listing
    public function monetization()
    {
        return $this->hasMany(ListingMonetization::class,'listing_id');
       
    }
   
    //url's
    public function urls()
    {
        return $this->hasMany('App\Url');
       
    }

    //offers
    public function offers()
    {
        return $this->hasMany('App\Offer');
       
    }

    //
    public function industry()
    {
    	return $this->belongsTo('App\Industry');
    }

     //bookmark
     public function bookmarks()
     {
         return $this->hasMany('App\Bookmark');
        
     }
     public function info()
    {
        return $this->hasMany('App\ListingInfo');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

   
    public function media()
    {
        return $this->hasMany(Media::class,'listing_id');
    }


    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


}
