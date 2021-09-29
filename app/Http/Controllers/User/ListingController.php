<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Exception;
use App\Listing;
use App\Finance;
use App\Url;
use App\Bookmark;
use App\Offer;
use App\ListingMonetization;
use App\Status;
use App\ListingInfo;
use App\Media;
use DB;


use App\Http\Requests\CreateListingRequest;

class ListingController extends Controller
{   
    ## To get listing result according to industry and monetization.s
    public function listingResult(Request $request){
        
        $listings=Listing::where('industry_id',$request->industry)->paginate(10);
        return view('user.pages.listing',compact('listings'));

     

    }
    ## To view all the listing 
    public function viewAllListings(Request $request){

        $data=Listing::where('status_id',Status::ACTIVE);
        
        //monetization
        if($request->monetization){
       
            $po =ListingMonetization::whereIn('monetization_id',$request->monetization)->pluck('listing_id')->toArray();
            $data = $data->whereIn('id',$po);
    
        }
        //industry
        if ($request->industry)
        {
            $data = $data->whereIn('industry_id',$request->industry);
        }
        if (trim($request->keyword))
        {
            $this->key = strtolower(trim($request->keyword));
            $data = $data->where(function($query) {
                $query->where('title','LIKE', '%'.$this->key."%")
                      ->orwhere('number','LIKE', '%'.$this->key."%")
                      ->orwhere('description','LIKE', '%'.$this->key."%");
            });
        }
        //price
        if ($request->price)
        {
            $price_limit= (explode(",",$request->price));
            $data = $data->whereBetween('price',$price_limit);
        }
        $cc_data = clone $data;
        $max_money = ($cc_data->max('price'))?:0;
        $min_money = ($cc_data->min('price'))?:0;

        //final-outcome
        $listings = $data->paginate(10);


        return view('user.pages.listing',compact('listings','request','max_money','min_money'));
    }


    ## To view a single listing
    public function showListing($id){
   
        $listing=Listing::where('id',$id)->first();
        $unlocked = unlocked($listing);

        if (!$unlocked)
        {
            $listing->title = $listing->industry->name;
            $listing->urls = [];
        } 
        return view('user.pages.listing-details',compact('listing','unlocked'));
        
        
    }

    ## To search  listing
    public function searchListing(Request $request){

        return null;
        
        //searching according to industry , monetization , price range
        $data=Listing::where('status_id',Status::ACTIVE);
        //monetization
        if($request->monetization && is_array($request->monetization) && !empty($request->monetization)){
       
            $po =ListingMonetization::whereIn('monetization_id',$request->monetization)->pluck('listing_id')->toArray();
            $data = $data->whereIn('id',$po);
    
        }
        //industry
        if($request->industry && is_array($request->industry) && !empty($request->industry)){
		
			$data = $data->whereIn('industry_id',$request->industry);
        }
        //price
        if ($request->price)
		{
            $price_limit= (explode(",",$request->price));
			$data = $data->whereBetween('price',$price_limit);
        }
        //final-outcome
        $listings = $data->paginate(10);

        return view('user.partials.listing',compact('listings'));
    }

    #### Add new listing
    public function addListing(CreateListingRequest $request){

     
        try{
            DB::beginTransaction();
            ## listing
            $listing=new Listing;
            $listing->user_id=auth()->user()->id;
            $listing->status_id=Status::INACTIVE;
            $listing->industry_id=$request->industry_id;
            $listing->number=date("YM").$listing->user_id;
            $listing->title=$request->title;
            $listing->description=$request->description;
            $listing->price=$request->price;
            $listing->staring_date=$request->starting_date;
            $listing->making_money_date=$request->making_money;
            $listing->save();
            ## monetization
            foreach($request->monetization as $key=>$value){
            $url=new ListingMonetization;
            $url->listing_id=$listing->id;
            $url->Monetization_id=$value;
            $url->save();
           }
            ## finances
            $finance=new Finance;
            $finance->listing_id=$listing->id;
            $finance->quater_profit=$request->quater_profit;
            $finance->biannual_profit=$request->biannual_profit;
            $finance->annual_profit=$request->annual_profit;
            $finance->save();
            ## url
            foreach($request->url as $key=>$value){
                if (!$value)
                {
                    continue;
                }
                $url=new Url;
                $url->listing_id=$listing->id;
                $url->type='website';
                $url->url=$value;
                $url->save();
             }


            if ($request->skill_required)
            {
                $listing_info = ListingInfo::firstOrNew(['key'=>'skill_req','listing_id'=>$listing->id]);
                $listing_info->title = "Work & Skills Required";
                $listing_info->value = $request->skill_required;
                $listing_info->save();
            }
            
            if ($request->work_per_week)
            {
                $listing_info = ListingInfo::firstOrNew(['key'=>'work_per_week','listing_id'=>$listing->id]);
                $listing_info->title = "Work Required Per Week";
                $listing_info->value = $request->work_per_week;
                $listing_info->save();
            }


            $listing_info = ListingInfo::firstOrNew(['key'=>'pbn','listing_id'=>$listing->id]);
            $listing_info->title = "Private Blog Network (PBN)";
            $listing_info->value = ($request->pbn)?:false;
            $listing_info->save();



            if ($request->platform)
            {
                $listing_info = ListingInfo::firstOrNew(['key'=>'platform','listing_id'=>$listing->id]);
                $listing_info->title = "Platform";
                $listing_info->value = $request->platform;
                $listing_info->save();
            }

            if ($request->assets)
            {
                $listing_info = ListingInfo::firstOrNew(['key'=>'assets','listing_id'=>$listing->id]);
                $listing_info->title = "Assets Included in the Sale";
                $listing_info->value = $request->assets;
                $listing_info->save();
            }

            //media files
            if($request->hasfile('attachments'))
            {
               foreach($request->file('attachments') as $file)
               {
                //save in file
                $filenameWithExt=$file->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$file->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$file->storeAs('public/listing_media',$fileNameToStore);
                //save in db records
                $media=new Media;
                $media->listing_id=$listing->id;
                $media->name=$fileNameToStore;
                $media->type=$extension;
                $media->save();
               }
                
            }

            DB::commit();

            

        return response()->json(['code'=>200, 'message'=>'Listing Created successfully'], 200);

        }catch(Exception $e)
        {
            DB::rollback();
            return response(['title'=>'Error', 'content'=>$e->getMessage()],500);
        }

    

  
    
        }


    #### Edit a listing    
    public function editBusiness($id){

        $listing = Listing::whereId($id)->first();
        return view('user.pages.edit-listing',compact('listing'));

    }  

    #### Update records of listing
    public function updateBusiness(Request $request){
       
  DB::beginTransaction();  
  try{

    $id=$request->id;
    ## listing
    $listing= Listing::whereId($id)->first();
    $listing->user_id=auth()->user()->id;
    $listing->status_id=Status::ACTIVE;
    $listing->number=date("YMD").$listing->user_id;
    $listing->industry_id=$request->industry_id;
    $listing->title=$request->title;
    $listing->description=$request->description;
    $listing->price=$request->price;
    $listing->staring_date=$request->starting_date;
    $listing->making_money_date=$request->making_money;
    $listing->save();

    ## monetization
    ListingMonetization::where('listing_id',$id)->delete();
       foreach($request->monetization as $key=>$value){
        $url=new ListingMonetization;
        $url->listing_id=$id;
        $url->monetization_id=$value;
        $url->save();
       }
   ## finances
    $finance=Finance::where('listing_id',$id)->first();
    $finance->listing_id=$id;
    $finance->quater_profit=$request->quater_profit;
    $finance->biannual_profit=$request->biannual_profit;
    $finance->annual_profit=$request->annual_profit;
    $finance->save();
    ## url
    Url::where('listing_id',$id)->delete();
    foreach($request->url as $key=>$value){
        if (!$value)
            {
                continue;
            }
        $url=new Url;
        $url->listing_id=$id;
        $url->type='website';
        $url->url=$value;
        $url->save();
         
    }

            $listing_info = ListingInfo::firstOrNew(['key'=>'skill_req','listing_id'=>$id]);
        $listing_info->title = "Work & Skills Required";
        $listing_info->value = $request->skill_required;
        $listing_info->save();
    // }
    
    // if ($request->work_per_week)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'work_per_week','listing_id'=>$id]);
        $listing_info->title = "Work Required Per Week";
        $listing_info->value = $request->work_per_week;
        $listing_info->save();
    // }


    $listing_info = ListingInfo::firstOrNew(['key'=>'pbn','listing_id'=>$id]);
    $listing_info->title = "Private Blog Network (PBN)";
    $listing_info->value = ($request->pbn)?:false;
    $listing_info->save();



    // if ($request->platform)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'platform','listing_id'=>$id]);
        $listing_info->title = "Platform";
        $listing_info->value = $request->platform;
        $listing_info->save();
    // }

    // if ($request->assets)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'assets','listing_id'=>$id]);
        $listing_info->title = "Assets Included in the Sale";
        $listing_info->value = $request->assets;
        $listing_info->save();

    
    DB::commit();
    return response()->json(['code'=>200, 'message'=>'Listing Updated successfully'], 200);
}
catch(Exception $e){
        DB::rollBack();
        return response(['title'=>'Error', 'content'=>$e->getMessage()],500);
    }
    }

    public function makeOffer(Request $request){
      
        $var=new Offer();
        $var->listing_id=$request->listing_id;
        $var->buyer_id=auth()->id();
        $var->amount=$request->amount;
        $var->message=$request->message;
        $var->save();
        return response()->json(['code'=>200, 'message'=>'Offer placed successfully'], 200);


    }


    
    public function bookmark(Request $request){

     if (Bookmark::where('listing_id', $request->my_listing_id)->exists()) {
          
         $entry=Bookmark::where('listing_id',$request->my_listing_id)->first();
         $entry->delete();
         return response()->json(['code'=>200, 'message'=>'Unbookmarked successfully'], 200);

   }else{

         $var=new Bookmark();
         $var->listing_id=$request->my_listing_id;
         $var->user_id=auth()->user()->id;
         $var->save();
         return response()->json(['code'=>200, 'message'=>'Bookmarked successfully'], 200);
     }

    }


   

}
