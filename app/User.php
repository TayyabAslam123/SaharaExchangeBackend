<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //messages / support tickets
    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    //offers
    public function offers()
    {
        return $this->hasMany(Offer::class,'buyer_id');
       
    }

    //profile
    public function profile()
    {
          return $this->hasone('App\Profile');
    }

    public function documents()
    {
        return $this->hasMany('App\UserDocuments')->orderBy('created_at','DESC');
    }
     public function valid_identity_document()
    {
        return $this->hasOne('App\UserDocuments')->where('type','identity')->where('is_approved',1);
    }

    public function processing_identity_document()
    {
        return $this->hasOne('App\UserDocuments')->where('is_checked',0);
    }

    public function listing()
    {
        return $this->hasMany('App\Listing');
    }

}
