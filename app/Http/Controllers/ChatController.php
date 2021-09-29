<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;


class ChatController extends Controller
{
    //
    public function index()
	{
		// Auth::loginUsingId(1);
		return view('chat');
	}

	/**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	public function fetchMessages()
	{
	  return Message::where('user_id',Auth::id())->orWhere('thread_id',Auth::id())->with('user')->get();
	}

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	// public function sendMessage(Request $request)
	// {
	//   $user = Auth::user();

	//   $message = $user->messages()->create([
	//     'message' => $request->input('message')
	//   ]);

	//   return ['status' => 'Message Sent!'];
	// }

	public function sendMessage(Request $request)
	{
		if (!$request->has('message') || !$request->message)
		{
			return;
		}
	  $user = Auth::user();
	  $sp_user_id = $user->id;

	  	  $message = $user->messages()->create([
	    'message' => $request->input('message'),
	    'thread_id'=>$sp_user_id
	  ]);

	  broadcast(new MessageSent($user, $message))->toOthers();

	  return ['status' => 'Message Sent!'];
	}
}
