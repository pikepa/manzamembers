<?php

namespace App\Http\Controllers;

use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return view('dashboard.home');
        $events = Event::orderBy('date', 'asc')->get();

        return view('dashboard.home', compact('events'));
    }
}
