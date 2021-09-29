<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use \Stripe\Stripe;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
 
        $availablePlans =[
            'price_1I8O0MIlqeNkvMCCcDDlNDm1' => "free",
            'plan2' => "basic",
         ];
         $data = [
             'intent' => auth()->user()->createSetupIntent(),
             'plans'=> $availablePlans
         ];

        
         return view('payment.sample')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        $planId = $request->plan;
        $user->newSubscription('main', $planId)->create($paymentMethod);

        return response([
            'success_url'=> redirect()->intended('/')->getTargetUrl(),
            'message'=>'success'
        ]);

    }
}
