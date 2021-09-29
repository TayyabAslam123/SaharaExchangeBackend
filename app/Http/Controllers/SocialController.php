<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

use App\Events\NewUserIsMadeEvent;
 
class SocialController extends Controller
{

    #### FACEBOOK
    public function redirectFacebook(){
          return Socialite::driver('facebook')->redirect();        
    }


    public function callbackFacebook(){
        
        $fbuser = Socialite::driver('facebook')->user(); // Fetch authenticated user

        if (!$fbuser->email)
        {
            return redirect("/login?error=Try Other Social Platform, Facebook Login Will Not Work for your this account");
        }
        
        $users=User::where(['email'=>$fbuser->email])->first();

        if($users){
            Auth::login($users);
            return redirect('/dashboard');
         }else{

        $user=User::create([
        'name'=> $fbuser->name,
        'email' =>$fbuser->email,
        'provider_id'=> $fbuser->id,
        'provider'=>'facebook',
        ]);

        Auth::login($user);
        return redirect('/dashboard');    

        }


    }
    #### FACEBOOK END 


    #### GMAIL
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();  
    }

    public function callbackGoogle(){
        $googleUser = Socialite::driver('google')->user();// Fetch authenticated user
      
        $users=User::where(['email'=>$googleUser->getEmail()],['provider_id'=>$googleUser->getId()])->first();
        
      if($users){
            Auth::login($users);
            return redirect('/dashboard');
         }else{

        $user=User::create([
        'name'=> $googleUser->getName(),
        'email' =>$googleUser->getEmail(),
        'provider_id'=> $googleUser->getId(),
        'provider'=>'google',
        ]);

        //login that user
        Auth::login($user);
        //trigger event
       // event(new NewUserRegisterEvent($users));
        //redirect to dashboard
        return redirect('/dashboard');    

         }


      
        
    }
    #### GMAIL END



}
