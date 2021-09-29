<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

 Route::group(['middleware'=>['web']],function(){
Route::get('test_session',function(){
  error_reporting(E_ALL); //always use for error reporting in development
ini_set('display_errors',1); //always!!! 

  echo time();
  echo "<br>".env("SESSION_DRIVER")."<br>";
  echo "<br>".ini_get('session.save_path')."<br>";

  echo session('abc');
  print_r(is_writable(config('session.files')));
  
  if(session()->has('abc'))
  {
    echo session()->get('abc');
  }else{
    echo "Setting Session";
    session()->put('abc', 'jai@gmail.com');
  }

  // print_r(scandir(storage_path("framework/sessions")));
  // echo session('abc');
});

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');
#### SIGNIN / SIGNUP START
 //normal
 Route::get('/signup','User\PageController@signup');
 // facebook
 Route::get('/redirect_fb', 'SocialController@redirectFacebook');
 Route::get('auth/facebook/callback', 'SocialController@callbackFacebook');
 //gmail
 Route::get('/redirect_google', 'SocialController@redirectGoogle');
 Route::get('/auth/google/callback', 'SocialController@callbackGoogle');
#### SIGNIN / SIGNUP END

## AUTHENTICATION MIDDLEWARE
 Route::group(['middleware'=>['web','auth']],function(){
## ADMINPANEL MIDDLEWARE   
 Route::group(['middleware'=>['AdminPanel']], function(){

    ###### Adminpanel ######
 Route::group(['prefix' => 'admin'], function ()
	{
   Route::get('/','Admin\AdminController@main');
   Route::resource('status','Admin\StatusController');
   Route::resource('monetization','Admin\MonetizationController');
   Route::resource('package','Admin\PackageController');
   Route::resource('social-platforms','Admin\SocialPlatformController');
   Route::resource('industry','Admin\IndustryController');
   Route::resource('subscribers','Admin\SubscriberController');
   Route::resource('faqs','Admin\FaqController');
   Route::resource('social-links','Admin\SocialLinkController');
   Route::resource('blog','Admin\BlogController');
   Route::resource('support-tickets','Admin\SupportTicketController');
   Route::resource('users','Admin\UserController');
   Route::resource('listing','Admin\ListingController');
   Route::get('offer','Admin\OfferController@allListing');
   Route::get('offer/{id}','Admin\OfferController@viewOffers');
   Route::resource('payment-gateway','Admin\PaymentGatewayController');
   Route::get('all-tickets','Admin\SupportController@allTickets');
   Route::get('view-ticket/{id}','Admin\SupportController@viewTicket');
   Route::post('/reply-ticket','Admin\SupportController@replyTicket');
   Route::get('/filter-ticket','Admin\SupportController@filterTicket');
   Route::any('user_documents','Admin\AdminController@userDocuments');
   Route::post('document/{id}','Admin\AdminController@updateDocument');
  });
  ##END ADMINPANEL MIDDLEWARE   
});
    ## End-Adminpanel
 });
## AUTHENTICATION MIDDLEWARE END
    ###### USER'S ######

    ##home
    Route::get('/','User\HomeController@main');
    ##about us & faq's
    Route::get('/about-us','User\PageController@aboutUs');
    Route::get('/seller-faq','User\FaqController@sellerFaq');
    Route::get('/buyer-faq','User\FaqController@buyerFaq');
    ##support message
    Route::get('/support','User\PageController@support');
    Route::post('/add-support-ticket','User\PageController@addSupportTicket');
    Route::any('/subscriber','User\PageController@subscribe');
    ##blog
    Route::get('/blog','User\BlogController@viewBlog');
    Route::get('/blog-post/{id}','User\BlogController@showPost');
    ##listing's
    Route::any('/listing','User\ListingController@viewAllListings');
    Route::get('/listing-details/{id}/{name}','User\ListingController@showListing');
    Route::get('/listing-details/{id}','User\ListingController@showListing');
    Route::any('/search-listing','User\ListingController@searchListing');
    Route::post('/bookmark','User\ListingController@bookmark');
    Route::any('/search','User\ListingController@viewAllListings');
    ##sell business
    Route::group(['middleware'=>'auth'],function(){
      Route::get('/sell-your-business','User\PageController@sellBusiness');
      Route::get('/business-valuation-tool','User\PageController@valuationTool');
      Route::get('/add-business','User\PageController@addBusiness');
      Route::post('/add-business','User\ListingController@addListing');
      Route::post('/make-offer','User\ListingController@makeOffer');
      Route::get('/edit-business/{id}','User\ListingController@editBusiness');
      Route::post('/edit-business','User\ListingController@updateBusiness');
    });
    
    #### END USER'S


   ### USER-DASHBOARD
   Route::group(['prefix' => 'dashboard', 'middleware'=>'auth'], function ()
	{
   Route::get('/','User\DashboardController@userDashboard');
   Route::get('/bookmark','User\DashboardController@bookmark'); 
   Route::get('/seller-listing','User\DashboardController@sellerListing');
   Route::post('/delete-listing','User\DashboardController@deleteListing');
   Route::get('/buyer-offers','User\DashboardController@buyerOffers');
   Route::get('/seller-offers','User\DashboardController@sellerOffers');
   Route::get('/setting','User\DashboardController@setting');
   Route::get('/password','User\DashboardController@password');
   Route::post('/profile','User\DashboardController@profile');
   Route::get('/add-ticket','User\DashboardController@addTicket');
   Route::get('/all-support-tickets','User\DashboardController@viewAllTicket');
   Route::get('/support-ticket/{id}','User\DashboardController@viewTicket');
   Route::post('/open-ticket','User\DashboardController@openTicket');
   Route::post('/reply-ticket','User\DashboardController@replyTicket');
   Route::get('/view-offers/{id}','User\DashboardController@viewOffers');
   Route::post('/update-password','User\DashboardController@updatePassword');
   
   Route::any('unlock-limit','User\DashboardController@unlock');
   Route::get('unlock_listing','User\DashboardController@unlockListing');
   Route::any('buy_now','User\DashboardController@buyNow');

   });
   ### END
   Route::get('/c', 'ChatController@index');
    Route::get('messages', 'ChatController@fetchMessages');
    Route::post('messages', 'ChatController@sendMessage');


   ##payment gateway 
   Route::get('/plans', 'PaymentController@index');
   Route::post('/subscribe', 'PaymentController@subscribe');

  


   Route::get('send-mail', function () {
   //return new \App\Mail\MyTestMail();
    Mail::to('codingtroops@gmail.com')->send(new \App\Mail\MyTestMail());
     
      dd("Email is Sent.");
  });

  Route::get('/testme','HomeController@testme');

  Route::get('/tw',function(){
     
    $data=123789;
    new App\Events\testevent($data);
  });

?>

