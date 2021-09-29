<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Exception;
use App\Listing;
use App\Finance;
use App\Url;
use App\ListingMonetization;
use App\ListingInfo;
use App\Status;
use App\media;

class ListingController extends Controller
{
    private $url='listing';
    private $redirect_url='admin/listing';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $title='Listings';
        $headings= ["id"=>"Id","title"=>"Title","status.status"=>"Status","created_at"=>"Created At","updated_at"=>"Lasted Edited"];
        $values=Listing::all();
        $url=$this->url;
        $custom_btn=$this->url.'/create';
        $public_url="/listing-details";
        $show_btn=true;
        return view('admin-panel.pages.index',compact('title','headings','values','url','custom_btn','public_url','show_btn'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.add-listing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
  DB::beginTransaction(); 
       
  try{

    ## listing
    $listing=new Listing;
    $listing->user_id=auth()->user()->id;
    $listing->status_id=Status::ACTIVE;
    $listing->industry_id=$request->industry_id;
    $listing->number=date("YMD").$listing->user_id;
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
        $url->monetization_id=$value;
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
        $url=new Url;
        $url->listing_id=$listing->id;
        $url->type='website';
        $url->url=$value;
        $url->save();
         
    }

    // if ($request->skill_required)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'skill_req','listing_id'=>$listing->id]);
        $listing_info->title = "Work & Skills Required";
        $listing_info->value = $request->skill_required;
        $listing_info->save();
    // }
    
    // if ($request->work_per_week)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'work_per_week','listing_id'=>$listing->id]);
        $listing_info->title = "Work Required Per Week";
        $listing_info->value = $request->work_per_week;
        $listing_info->save();
    // }


    $listing_info = ListingInfo::firstOrNew(['key'=>'pbn','listing_id'=>$listing->id]);
    $listing_info->title = "Private Blog Network (PBN)";
    $listing_info->value = ($request->pbn)?:false;
    $listing_info->save();



    // if ($request->platform)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'platform','listing_id'=>$listing->id]);
        $listing_info->title = "Platform";
        $listing_info->value = $request->platform;
        $listing_info->save();
    // }

    // if ($request->assets)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'assets','listing_id'=>$listing->id]);
        $listing_info->title = "Assets Included in the Sale";
        $listing_info->value = $request->assets;
        $listing_info->save();
    // }
  
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
    Session::flash('message', 'ADDED SUCCESSFULLY');
    Session::flash('alert-class', 'alert-success'); 
    return redirect($this->redirect_url);
}
catch(Exception $e){
        DB::rollBack();
        Session::flash('message', $e->getMessage());
        Session::flash('alert-class', 'alert-danger'); 
        return redirect($this->redirect_url);
    }

    
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $listing = Listing::whereId($id)->first();
        return view('admin-panel.pages.edit-listing',compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
    
  DB::beginTransaction(); 
       
  try{

    ## listing
    $listing= Listing::whereId($id)->first();
    $listing->status_id=$request->status_id;
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
        $url->listing_id=$listing->id;
        $url->monetization_id=$value;
        $url->save();
       }
   ## finances
    $finance=Finance::where('listing_id',$id)->first();
    $finance->listing_id=$listing->id;
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
        $url->listing_id=$listing->id;
        $url->type='website';
        $url->url=$value;
        $url->save();
         
    }

            $listing_info = ListingInfo::firstOrNew(['key'=>'skill_req','listing_id'=>$listing->id]);
        $listing_info->title = "Work & Skills Required";
        $listing_info->value = $request->skill_required;
        $listing_info->save();
    // }
    
    // if ($request->work_per_week)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'work_per_week','listing_id'=>$listing->id]);
        $listing_info->title = "Work Required Per Week";
        $listing_info->value = $request->work_per_week;
        $listing_info->save();
    // }


    $listing_info = ListingInfo::firstOrNew(['key'=>'pbn','listing_id'=>$listing->id]);
    $listing_info->title = "Private Blog Network (PBN)";
    $listing_info->value = ($request->pbn)?:false;
    $listing_info->save();



    // if ($request->platform)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'platform','listing_id'=>$listing->id]);
        $listing_info->title = "Platform";
        $listing_info->value = $request->platform;
        $listing_info->save();
    // }

    // if ($request->assets)
    // {
        $listing_info = ListingInfo::firstOrNew(['key'=>'assets','listing_id'=>$listing->id]);
        $listing_info->title = "Assets Included in the Sale";
        $listing_info->value = $request->assets;
        $listing_info->save();

    
    DB::commit();
    Session::flash('message', 'UPDATED SUCCESSFULLY');
    Session::flash('alert-class', 'alert-success'); 
    return redirect($this->redirect_url);
}
catch(Exception $e){
        DB::rollBack();
        Session::flash('message', $e->getMessage());
        Session::flash('alert-class', 'alert-danger'); 
        return redirect($this->redirect_url);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Listing::findOrFail($id)->delete();
            Session::flash('message', 'DELETED SUCCESSFULLY');
            Session::flash('alert-class', 'alert-success'); 
            return redirect($this->redirect_url);
        }
            catch(Exception $e)
              {
                
                Session::flash('message', $e->getMessage());
                Session::flash('alert-class', 'alert-danger'); 
                return redirect($this->redirect_url);
              }
    }
}
