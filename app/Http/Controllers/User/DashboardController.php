<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Bookmark;
use App\Profile;
use App\Listing;
use App\Support;
use App\Ticketinfo;
use App\Offer;
use App\User;
use App\UserDocuments;
use App\ListingUnlock;

use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
  

class DashboardController extends Controller
{
    
  ## Dashboard  
  public function userDashboard(){
    return view('user.dashboard.dashboard');
  }

 ## Bookmarks
  public function bookmark(){
    $bookmarks=Bookmark::where('user_id',auth()->user()->id)->get();
  
    return view('user.dashboard.bookmarks',compact('bookmarks'));
 }

 ## Settings
public function setting(){
    $profile=Profile::where('user_id',auth()->user()->id)->first();
  
    return view('user.dashboard.setting',compact('profile'));
}



public function password(){


  return view('user.dashboard.password');
}

########## SUPPORT TICKETING SYSTEM ######################

## Show all my tickets
public function viewAllTicket(){

  $tickets=Support::where('user_id',auth()->user()->id)->get();
  return view('user.dashboard.view-all-tickets',compact('tickets'));
   }

## Show ticket details
public function viewTicket($id){
  $data=Support::where('id',$id)->first();

  return view('user.dashboard.view-ticket',compact('data'));
  }
  
## Show add ticket form
public function addTicket(){
 return view('user.dashboard.add-ticket');
 }


## open a ticket
public function openTicket(Request $request){

  $var=new Support();
  $var->user_id=auth()->user()->id;
  $var->name=$request->name;
  $var->email=$request->email_address;
  $var->subject=$request->subject;
  $var->priority=$request->priority;
  $var->status_id=get_status_id('active');
  $var->save();

  $info=new Ticketinfo();
  $info->ticket_id=$var->id;
  $info->message=$request->message;
  $info->user_type='client';
  $info->save();

  return response()->json(['code'=>200, 'message'=>'ticket opened successfully'], 200);


}

public function replyTicket(Request $request){

  $var=new Ticketinfo();
  $var->ticket_id=$request->ticket_id;
  $var->message=$request->message;
  $var->user_type='client';
  $var->save();
  return response()->json(['code'=>200, 'message'=>'Replied successfully'], 200);

}



########### END TICKETING ############################

 ## User profile
public function profile(Request $request){

  if($request->hasFile('myImage'))
  {
    $filenameWithExt=$request->file('myImage')->getClientOriginalName();
    $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
    $extension=$request->file('myImage')->getClientOriginalExtension();
    //time() so that images stay unique 
    $fileNameToStore=$filename.'_'.time().'.'.$extension;
    $path=$request->file('myImage')->storeAs('public/profile_images',$fileNameToStore);
   if(isset($request->old_image)){
      @unlink("storage/profile_images/".$request->old_image);
    }
   
  }
elseif(isset($request->old_image)){
  $fileNameToStore=$request->old_image;
  }
else{
  $fileNameToStore='no_img.jpg';
}  

$data=Profile::updateOrCreate(['email' => auth()->user()->email], [
    'first_name'=>$request->first_name,
    'last_name'=>$request->last_name,
    'company_name'=>$request->company_name,
    'address'=>$request->address,
    'city'=>$request->city,
    'state'=>$request->state,
    'country'=>$request->country,
    'phone_number'=>$request->phone_number,
    'zip'=>$request->zip,

    'image'=>$fileNameToStore,
    'user_id'=>auth()->user()->id,
    'status_id'=>get_status_id('active'),
  ]);

  return response()->json(['code'=>200, 'message'=>'Profile Saved successfully'], 200);


}

##update your password
public function updatePassword(Request $request){

  $validator=Validator::make($request->all(),[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
    ]);
    //end
    if ($validator->fails()) {
        return response(['title'=>'Unable to update password','content'=>$validator->messages()->first()],500);
    }
    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
  return response()->json(['code'=>200, 'message'=>'New Password Saved successfully'], 200);

}
############# Seller start ##############################

##seller-listing
public function sellerListing(){
  $listing=Listing::where('user_id',auth()->user()->id)->get();
  return view('user.dashboard.seller-listing',compact('listing'));
}

##seller-offers
public function sellerOffers(){
  $listings=Listing::where('user_id',auth()->user()->id)->get();
  return view('user.dashboard.seller-offers',compact('listings'));
}

##delete-listing
public function deleteListing(Request $request){

  $id=$request->my_listing_id;
  Listing::findOrFail($id)->delete();
  return response()->json(['code'=>200, 'message'=>'Listing Deleted'], 200);
  }

##To view offers of a particular listing
public function viewOffers($id){

      $offers=Offer::where('listing_id',$id)->get();
      return view('user.dashboard.view-offers',compact('offers'));
}

########### END SELLER ############################



############ Buyer start ################################

##buyer-offers
public function buyerOffers(){
  $myoffers=Offer::where('buyer_id',auth()->user()->id)->get();
  return view('user.dashboard.buyer-offers',compact('myoffers'));
}

// @unlock-limit
public function unlock(Request $request){
  if ($request->hasFile('bank_statement'))
  {
      if ($request->hasFile('identity'))
      {
        $path = $request->file('identity')->store('public/user_documents');
        user_documents_storage($path, "Identification Document for Limit Increase");
      }
      //do some processing of file uploads or file email
      $path = $request->file('bank_statement')->store('public/user_documents');
      user_documents_storage($path, "Bank Document for Limit Increase","bank");
  }

  return view('user.dashboard.unlock-limit');
}


public function unlockListing(Request $request)
{
  $listing = Listing::whereId($request->id)->first();
  if (!$listing || $listing->price > auth()->user()->unlock_limit)
  {
      return view('user.partials.unlock-error')->render();
  }

  //if we are good to go, then unlock the listing
  $unlock = ListingUnlock::firstOrNew(['user_id'=>auth()->id(), 'listing_id'=>$listing->id]);
  $unlock->save();

  return view('user.partials.unlock-success')->render();
}


public function buyNow(Request $request)
{
    $listing = Listing::whereId($request->listing_id)->first();
    if (!$listing || $listing->user_id == auth()->id())
    {
        return response(['content'=>"You Cannot Buy this Listing", "title"=>"Error"], 500);
    }
    if (!$request->bank_name || !$request->account_name || !$request->message_buy)
    {
      return response(['content'=>"Check Your information submitted", "title"=>"Error"], 500);
    }
    $offer = Offer::firstOrNew(['listing_id'=>$listing->id, 'buyer_id'=>auth()->id()]);
    $offer->message = "Method: Full Payment <br> Bank".$request->bank_name."<br> Account Name:".$request->account_name."<br> Message: ".$request->message_buy;
    $offer->amount = $listing->price;
    $offer->save();
    return response(['content'=>"Congratulations, Request Submitted successfully. Our Team will get in touch with you", "title"=>"Success"]);
}



########## END BUYER ##############################

}


