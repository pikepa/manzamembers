<?php

namespace App\Http\Controllers;
use Session;
use App\Event;
use App\Priceitem;
use App\SpecialClasses\Event_Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Auth\Middleware\Auth;
use App\SpecialClasses\Category_Type;

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
        $item=new Category_Type;
        $items=$item->bookinginfo();

        $status=new Event_Status;
        $statuses=$status->getstatus();

        $event= new Event;

        $event->date = Carbon::now(); 
        return view('events.create', compact('event','items','statuses'));
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
                    'max_bookings' => 'required',
                    'date' => 'date|required',
                    'timing'=> 'required',
                    'status'=> 'status',
                    'featured_img'=>'',
                    'published_at'=>'',
                ]); 

        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->venue = $request->venue;
        $event->v_address = Purifier::clean($request->v_address);
        $event->bookings_only = $request->bookings_only;
        $event->add_info = $request->add_info;
        $event->max_bookings = $request->max_bookings;
        $event->memb_na = $request->memb_na;        
        $event->date = $request->date;
        $event->published_at = $request->published_at;
        $event->timing = $request->timing;
        $event->featured_img = $request->featured_img;
        $event->status = $request->status;

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
        
        session:flush();
        session(['memb_required' => $event->isMembershipRequired()]);
             
        $priceitems=Priceitem::with('category')
        ->orderBy('memb','desc')
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

        $item=new Category_Type;
        $items=$item->bookinginfo();

        $status=new Event_Status;
        $statuses=$status->getstatus();
        $images = $event->getMedia('photos');
            
        return view('events.edit',compact('event','items','images','statuses'));
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
                    'max_bookings' => 'required',
                    'date' => 'date|required',
                    'timing'=> 'required',
                    'status'=> 'required',
                    'featured_img'=>'',
                    'published_at'=>'',
                ]); 


        $event->title = $request->title;
        $event->description = Purifier::clean($request->description);
        $event->venue = $request->venue;
        $event->v_address = Purifier::clean($request->v_address);
        $event->bookings_only = $request->bookings_only;
        $event->add_info = $request->add_info;
        $event->max_bookings = $request->max_bookings;        
        $event->memb_na = $request->memb_na;        
        $event->date = $request->date;
        $event->published_at = $request->published_at;
        $event->timing = $request->timing;
        $event->status = $request->status;
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
