<?php

//for all avialable social links
function social_links(){
    $values=App\Sociallink::all();
	return $values;
}

//for getting all monetization added
function get_monetizations($count = -1){

$data=App\Monetization::query();
if ($count > 0)
{
	$data = $data->limit($count);
}
return $data->get();
}

//for getting all industry
function get_industry(){

	$data=App\Industry::all();
	return $data;
}
function get_status(){

	$data=App\Status::all();
	return $data;
}

//date formet
function date_frmt($date)
{
	return date('d M Y', strtotime($date));
}

//is selected
function is_selected($opt, $val)
{
	if (is_array($opt))
	{
		if (in_array($val, $opt))
		{
			return 'selected="selected"';
		}
	}else if ($opt == $val)
	{
		return 'selected="selected"';
	}
	return '';
}

function is_checked($opt, $val)
{
	if (is_array($opt))
	{
		if (in_array($val, $opt))
		{
			return 'checked="checked"';
		}
	}else if ($opt == $val)
	{
		return 'checked="checked"';
	}
	return '';
}

//to check top menu styling
function top_menu($data){

	if($data=="/" || "about-us" || "seller-faq" || "buyer-faq"){
		return true;
	}

	else{
		return false;
	}

}

//get name by id
function get_industry_name($id){

	$industry_name=App\Industry::where('id',$id)->first();
	$industry_name=$industry_name->name;
	return $industry_name;
}

//get name by id
function get_listing_name($id){

	$listing=App\Listing::where('id',$id)->first();

	return $listing;
}
// get lastest listing
function get_latest_listing(){

	$listing=App\Listing::orderBy('created_at', 'DESC')->take(5)->get();
	return $listing;

}

// get featured blog's
function get_featured_blog_post(){
	$blog=App\Blog::orderBy('created_at', 'DESC')->take(3)->get();
	return $blog;
}

//get my_ticket_count
function get_ticket_count(){
	$count=App\Support::where('user_id',auth()->user()->id)->get();
	$count=count($count);

	return $count;
}

//get status id by its name
function get_status_id($status){
	$status_id=App\Status::Select('id')->where('status', 'like','%'.$status.'%')->first();
    return $status_id['id'];
}


//get recommended business
function get_recom_listing(){

	$listing=App\Listing::take(3)->get();
	return $listing;

}

function get_listing_info($listing, $parameter)
{
	$info = \App\ListingInfo::firstOrNew(['listing_id'=>$listing->id, 'key'=>$parameter]);
	if ($info->id)
	{
		return $info->value;
	}
	$info->value="";
	$info->save();
	return $info->value;
}


#### BUYER/SELLER DASHBOARD HELPERS FUNCTION

function myListingCount(){
	$listingCount=App\Listing::where('user_id',auth()->user()->id)->count();
	return $listingCount;
}

function myOffersCount(){
	$count=App\Offer::where('buyer_id',auth()->user()->id)->count();
	return $count;
}


function checkBookmark($listing_id){

	if (App\Bookmark::where('listing_id', $listing_id)->exists()) {
	return true;
	 }
}


function myListings(){
	$listing=App\Listing::where('user_id',auth()->user()->id)->get();
	return $listing;
}

function myoffers(){
	$offers=App\Offer::all();

	return $offers;
}
function unlocked($listing)
{
	/*
		Instant access to the site URL(s)
		Detailed proof of earnings and traffic
		Access to seller for questions and follow-ups
	*/
	if (!auth()->check())
	{
		return false;
	}

	if (auth()->id() == $listing->user_id)
	{
		return true;
	}

	return \App\ListingUnlock::where("user_id",auth()->id())->where('listing_id', $listing->id)->first();
}

function user_documents_storage($path, $name, $type="identity")
{
	$user_document = new \App\UserDocuments;
      $user_document->user_id = auth()->id();
      $user_document->path=$path;
      $user_document->name=$name;
      $user_document->type=$type;
      $user_document->save();
}
function unread_documents()
{
	return \App\UserDocuments::where('is_checked',false)->count();
}

function random_image_in_monetization()
{
	$images = ["amazon.jpg","bg_niche.jpeg","bg_picture.jpeg","bg_sales.jpeg","consulting.jpeg","education.jpeg","job-category-01.jpg"];
	return asset("user/images/".$images[array_rand($images,1)]);
}



function get_featured_monetizations(){

	$data=App\Monetization::where('is_featured',1)->get();
	return  $data;

}