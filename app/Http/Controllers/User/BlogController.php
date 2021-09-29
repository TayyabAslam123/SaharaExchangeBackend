<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    //view blog
    public function viewBlog(){

        $upper_sec=Blog::all();
        $lower_sec=BLog::paginate(3);
        return view('user.pages.blog',compact('upper_sec','lower_sec'));
    }

    //show a post
    public function showPost($id){

        $post=Blog::where('id',$id)->first();
        $related_post=Blog::all()->take(2);
        
        return view('user.pages.blog-post',compact('post','related_post'));
        
    }


}
