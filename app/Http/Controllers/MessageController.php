<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Auth\Middleware\Auth;

class MessageController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'destroy', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignedCats = [];

        return view('messages.create', compact('assignedCats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'email|required',
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content'=>'required|min:10',
            'my_question'=>'required',
        ]);

        $message = new Message;

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->content = Purifier::clean($request->content);

        if (strtoupper($request->my_question) === '5') {
            $message->save();

            return redirect('/')->with('success', 'Message has been sent');
        } else {
            return redirect('/')->with('failure', 'No Message has been sent');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $message = Message::find($message->id);

        return view('messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message = Message::find($message->id);
        $message->delete();

        return redirect('message')->with('Success', 'Message has been deleted');
    }
}
