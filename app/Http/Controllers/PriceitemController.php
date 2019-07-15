<?php

namespace App\Http\Controllers;

use App\Event;
use App\Priceitem;
use Illuminate\Http\Request;

class PriceitemController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ( $event_id)
    {    
                     
        return view('priceitems.create', compact('event_id'));    
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
                'event_id' => 'required',
                'type' => 'required',
                'price' => 'required',
            ]);

        $priceitem = new Priceitem;

        $priceitem->event_id = $request->event_id;
        $priceitem->price_type_id = $request->type;
        $priceitem->price = $request->price;

        $priceitem->save();   

        $event = Event::find($request->event_id);
        return redirect('event/'.$request->event_id);
    //    return view('events.show', compact('event')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Priceitem  $priceitem
     * @return \Illuminate\Http\Response
     */
    public function show(Priceitem $priceitem)
    {
        //this is carried out in the Event Controller
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Priceitem  $priceitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Priceitem $priceitem)
    {
        // It is quicker to delete the line and add a new one
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Priceitem  $priceitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priceitem $priceitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priceitem  $priceitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priceitem $priceitem)
    {
        $priceitem = Priceitem::find($priceitem->id);
        $priceitem->delete();

        return redirect('event/'.$priceitem->event_id)
            ->with('Success', 'Line Item has been deleted');    }
}
