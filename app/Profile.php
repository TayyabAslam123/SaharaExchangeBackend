<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'first_name',
    'last_name',
    'company_name',
    'address',
    'city',
    'state',
    'country',
    'phone_number',
    'zip',
    'email',
    'image',
    'user_id',
    'status_id',
    ];
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
