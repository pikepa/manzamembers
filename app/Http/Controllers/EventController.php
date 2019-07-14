<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Auth\Middleware\Auth;

class EventController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('event_date','asc')->get();
             
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignedCats = [];

        return view('event.create', compact('assignedCats'));
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
        ]);

        $message = new Message;

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->content = Purifier::clean($request->content);

        if (strtoupper($request->my_question) === 'DUTCH') {
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
    public function show(Event $event)
    {
        $event = Event::find($event->id);

        return view('events.show', compact('event'));
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
