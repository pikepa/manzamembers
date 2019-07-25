<?php

namespace App\Http\Controllers;

use App\Event;
use App\Priceitem;
use Carbon\Carbon;
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
        $events = Event::orderBy('date','asc')->get();
             
        return view('dashboard.home', compact('events'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event= new Event;

        $event->date = Carbon::now(); 
        return view('events.create', compact('event'));
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
                    'title' => 'required|min:3',
                    'description' => 'required|min:10',
                    'venue' => 'required',
                    'v_address' => 'required',
                    'date' => 'date|required',
                    'timing'=> 'required',
                    'featured_img'=>'',
                    'published_at'=>'',
                ]); 

        $event = new Event;

        $event->title = $request->title;
        $event->description = Purifier::clean($request->description);
        $event->venue = $request->venue;
        $event->v_address = Purifier::clean($request->v_address);
        $event->date = $request->date;
        $event->timing = $request->timing;
        $event->featured_img = $request->featured_img;
        $event->status = 'pending';
        $event->published_at = $request->published_at;

        $event->save()  ;         
        return redirect( $event->path() )->with('success', 'Event has been added');

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
        $priceitems=Priceitem::with('category')
        ->where('event_id',$event->id)->get();
        return view('events.show', compact('event','priceitems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {                     
        $event->description=nl2br($event->description);
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
         $this->validate(request(), [
                    'title' => 'required|min:3',
                    'description' => 'required|min:10',
                    'venue' => 'required',
                    'v_address' => 'required',
                    'date' => 'date|required',
                    'timing'=> 'required',
                    'featured_img'=>'',
                    'published_at'=>'',
                ]); 


        $event->title = $request->title;
        $event->description = Purifier::clean($request->description);
        $event->venue = $request->venue;
        $event->v_address = Purifier::clean($request->v_address);
        $event->date = $request->date;
        $event->timing = $request->timing;
  //      $event->featured_img = $request->featured_img;
        $event->status = 'pending';
        $event->published_at = $request->published_at;

        $event->update()  ;  
                                   
        return redirect( $event->path() )->with('success', 'Event has been added');
                                   
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
