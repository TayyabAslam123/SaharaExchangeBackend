<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use Exception;

class UserController extends Controller
{
    private $url='users';
    private $redirect_url='admin/users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Users';
        $headings= ["id"=>"Id","name"=>"Name","email"=>"Email","unlock_limit"=>"Limit","created_at"=>"Created At","updated_at"=>"Updated At"];
        $values=User::all();
        $url=$this->url;
  
        return view('admin-panel.pages.index',compact('title','headings','values','url'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=User::findorfail($id);
        $headings1= ["name"=>"Name","email"=>"Email","unlock_limit"=>"Limit","created_at"=>"Created At","updated_at"=>"Updated At"];
        $headings2= ["company_name"=>"Company Name","address"=>"Address","city"=>"City","state"=>"State","phone_number"=>"Phone Number","zip"=>"Zip",];
       
        return view('admin-panel.pages.show',compact('data','headings1','headings2'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orient=User::whereId($id)->first();
        $url=$this->redirect_url;
        $title="User";
        $data = [['name'=>'Name',"naming"=>"name","type"=>"text", "attrib"=>'required="required" name="name" maxlength="200"'],
        ['name'=>'Email', "naming"=>"email","type"=>"email", "attrib"=>'required="required" name="email" maxlength="200"'],
        ['name'=>'Password (only if you want to change it)', "naming"=>"","type"=>"password", "attrib"=>'required="required" name="password" maxlength="200"',"name"=>"Unlock Limit","naming"=>"unlock_limit", "type"=>"number", "attrib"=>'required="required" name="unlock_limit" min="0"'],
    
    ];
    $additional = view('admin-panel.pages.documents',compact('orient'))->render();
       
        return view('admin-panel.pages.edit',compact('title','data','url','orient','additional'));
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
        try{
            $var = User::whereId($id)->first();
            $var->name = $request->name;
            $var->email = $request->email;
            $var->unlock_limit=$request->unlock_limit;
            $var->save();

            if ($request->password)
            {
                $var->password = Hash::make($request->password);
                $var->save();
            }
            Session::flash('message', 'UPDATED SUCCESSFULLY');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::findOrFail($id)->delete();
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
