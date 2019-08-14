@extends('layouts.app')

@section('title', 'Make Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-2/3 my-4 mx-auto card p-6  rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>

        <form 
                method="POST"
                action="/eventbooking"
        >
            @include ('bookings.form', [
                'buttonText' => 'Continue'
            ]) 
        </form>
    </div>
    </div>

@endsection