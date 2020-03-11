<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Room;
class MessagesController extends Controller
{
    public function submit(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required'
      ]);

      // Create New Message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->subject = $request->input('subject');
      $message->message = $request->input('message');
      // Save Message
      $message->save();

      // Redirect
      return redirect('/contact')->with('success', 'Message Sent');
    }

    public function getMessages(){
    //  $messages = Message::all();
      $messages = Message::orderBy('created_at', 'desc')->get();
      //update all records on database to read
      Message::query()->update(['status' => 0]);
      $title = 'Admin - Messages';
      return view('admin.messages')
      ->with('title', $title)
      ->with('messages', $messages);
    }
}
