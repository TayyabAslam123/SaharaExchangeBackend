<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //update migration description , featured
    protected $fillable = ['title', 'description', 'image','user_id'];

}
