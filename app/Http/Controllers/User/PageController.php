<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Ticketinfo;
use App\Subscriber;
use Session;
use DB;
use Exception;
use Auth;

class PageController extends Controller
{
    public function home(){

        return view('user.pages.home');
        
    }

 public function aboutUs(){

        return view('user.pages.about-us');
        
    }

    public function buyerFaq(){
        return view('user.pages.buyer-faq');
        
    }

    public function sellerFaq(){

        return view('user.pages.seller-faq');
        
    }

    public function support(){

        return view('user.pages.support');
        
    }

    public function blog(){

        return view('user.pages.blog');
        
    }

    
    public function sellBusiness(){

        return view('user.pages.sell-your-business');
        
    }

 
    public function addBusiness(){

        return view('user.pages.add-new-listing');
        
    }

    public function valuationTool(){
        return view('user.pages.valuation-tool');
        
    }
    
    #### INCOMING REQUEST'S
    public function addSupportTicket(Request $request){
      
        //ticket basic info
        $var=new Support();
        $var->user_id=Auth::check() ? auth()->user()->id : null;
        $var->name=$request->name;
        $var->email=$request->email_address;
        $var->subject=$request->subject;
        $var->priority=$request->priority;
        $var->status_id=get_status_id('active');
        $var->save();
        //ticket detailed info
        $info=new Ticketinfo();
        $info->ticket_id=$var->id;
        $info->message=$request->message;
        $info->user_type='client';
        $info->save();
      
        return response()->json(['code'=>200, 'message'=>'ticket opened successfully'], 200);
  
      
        
    }

    ## subscribe 
    public function subscribe(Request $request){
        
        $var = new Subscriber;
        $var->email= $request->email;
        $var->save();
    
        return response(['title'=>'Successful','content'=>'Class Added Successfully']);
    }


    public function signin(){
        return view('authentication.signin');
    }

    public function signup(){
        return view('authentication.signup');
    }



  
}
