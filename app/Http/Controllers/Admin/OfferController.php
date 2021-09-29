<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Listing;
use App\Offer;
use Session;
use Exception;

class OfferController extends Controller
{
    private $url='offer';
    private $redirect_url='admin/offer';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allListing()
    {
        $title='All Listings With Offers';
        $headings= ["id"=>"Id","title"=>"Title","status.status"=>"Status","user.name"=>"Owner Name","user.email"=>"Owner Email","created_at"=>"Created At","updated_at"=>"Lasted Edited"];
        $values=Listing::has('offers')->get();
        $url=$this->url;
        $public_url="/listing-details";
        $show_btn=true;
        $offer=true;

        return view('admin-panel.pages.index',compact('title','headings','values','url','public_url','show_btn','offer'));
       
    }

    public function viewOffers($id){

        $title='All Offers';
        $headings= ["id"=>"Id","listing.title"=>"Listing Title","listing.price"=>"Listing Price","user.name"=>"Buyer Name","user.email"=>"Buyer Email","amount"=>"Amount","message"=>"Message","created_at"=>"Created At","updated_at"=>"Lasted Edited"];
        $values=Offer::where('listing_id',$id)->get();
        $url=$this->url;
        $public_url="/listing-details";
        $show_btn=true;
        $remove_del=true;
        $remove_edit=true;
       
     
        return view('admin-panel.pages.index',compact('title','headings','values','url','public_url','show_btn','remove_del','remove_edit'));
        

    }

}
