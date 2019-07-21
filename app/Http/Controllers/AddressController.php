<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
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
    public function create()
    {
        return view('addresses.create');
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
                'type' => 'required',
                'addr1' => 'required',
                'addr2' => 'required',
                'city' => 'required',
                'postcode' => 'required',
                'country'=> 'required',
                'membership_id'=> 'integer',
            ]);
        $address = new Address;

        $address->membership_id = $request->membership_id;
        $address->type = $request->type;
        $address->addr1 = $request->addr1;
        $address->addr2 = $request->addr2;
        $address->addr3 = $request->addr3;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->country = $request->country;

        $address->save();

        return redirect('membership/'.$address->membership_id)->with('message', 'An address has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}