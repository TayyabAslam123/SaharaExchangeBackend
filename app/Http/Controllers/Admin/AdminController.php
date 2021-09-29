<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Listing;
use App\Invoice;
use App\Industry;
use App\Monetization;
use App\ListingMonetization;
use App\userDocuments;
use DB;

class AdminController extends Controller
{
    
    public function main(){
        //tabs content
    	$user_count = User::count();
    	$listing_count = Listing::count();
    	$total_revenue = Invoice::where('date','>=',now()->subDays(30))->sum('amount');
    	$total_deals = Invoice::where('date','>=',now()->subDays(30))->count('amount');
        //graph for industries 
        $listing_industry_arr=[];
        $industries=Industry::all();
        foreach($industries as $industry){
            $listing_industry_arr[$industry->name]=Listing::where('industry_id',$industry->id)->count();   
        }
        //graph for monetization 
        $listing_monetization_arr=[];
        $monetizations=Monetization::all();
        foreach($monetizations as $var){
            $listing_monetization_arr[$var->name]=ListingMonetization::where('monetization_id',$var->id)->count();   
        }
        //graph to get listing added  month wise 
         $listings = Listing::selectRaw("count(*) as total,DATE_FORMAT(created_at, '%b %Y') as month")->groupBy('month')->get();
    
        //graph to get users joined sahara month wise
         $users =User::selectRaw("count(*) as total,DATE_FORMAT(created_at, '%b %Y') as month")->groupBy('month')->get();
        return view('admin-panel.main', compact('user_count','listing_count','total_revenue','total_deals','listing_industry_arr','listing_monetization_arr','listings','users'));
    }


    public function userDocuments(Request $request)
    {
        $user_documents = UserDocuments::selectRaw("user_id, min(is_checked) as is_checked, max(created_at) as created_at")->groupBy('user_id')->get();
        
        return view('admin-panel.pages.user-documents',compact('user_documents'));
    }
    public function updateDocument($id, Request $request)
    {
      $user_document = UserDocuments::whereId($id)->first();
      $user_document->comment = $request->comment;
      $user_document->is_approved=($request->is_approved)?true:false;
       $user_document->is_checked=($request->is_checked)?true:false;
       $user_document->save();
      return redirect()->back();
    }
    
}
