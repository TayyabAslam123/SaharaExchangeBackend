<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Monetization;

class HomeController extends Controller
{
    public function main(){
        $monetizations=Monetization::all();
        return view('user.pages.home',compact('monetizations'));

    }
}
