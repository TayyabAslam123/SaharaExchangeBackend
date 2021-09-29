<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Ticketinfo;
use Session;
use Exception;

class SupportController extends Controller
{
    ## get all tickets
    public function allTickets(){
        $title='Support';
        $headings= ["id"=>"Id","subject"=>"Subject","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=Support::all();
        return view('admin-panel.pages.support-tickets',compact('title','headings','values'));
    }

    ## view ticket details
    public function viewTicket($id)
   {
    $data=Support::where('id',$id)->first();
    return view('admin-panel.pages.view-ticket',compact('data'));   
   }

   ## reply from support
   public function replyTicket(Request $request){

    $var=new Ticketinfo();
    $var->ticket_id=$request->ticket_id;
    $var->message=$request->message;
    $var->user_type='support';
    $var->save();
    return redirect('admin/view-ticket/'.$request->ticket_id);
  
  }

    ## filter tickets
    public function filterTicket(Request $request){

 
      $data=Support::query();
      if($request->status){
         $status_id=get_status_id($request->status);
         $data=$data->where('name', 'like','%'.$status_id.'%');
       }  
      if($request->name){
        $data=$data->where('name', 'like','%'.$request->name.'%');
       }    
      if($request->email){
        $data=$data->where('email', 'like','%'.$request->email.'%');
      } 
      if($request->subject){
        $data=$data->where('name', 'like','%'.$request->subject.'%');
      } 
      
      $values=$data->get();

      $title='Support';
      $headings= ["id"=>"Id","subject"=>"Subject","created_at"=>"Created At","updated_at"=>"Updated At"];
      return view('admin-panel.pages.support-tickets',compact('title','headings','values'));

    
    
    }


    
}
