<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
class FaqController extends Controller
{
    public function buyerFaq(){
      $data=Faq::where('user_type','buyer')->get();
      return view('user.pages.buyer-faq',compact('data'));
    }

    public function sellerFaq(){
       $data=Faq::where('user_type','seller')->get();
       return view('user.pages.seller-faq',compact('data'));

    }

}
