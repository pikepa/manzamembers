@extends('layouts.app')

@section('title', 'Make Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto md:w-2/5">
    <div class="my-4 mx-auto card  rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>

        <form
                method="POST"
                action="/eventbooking"
        >
            @include ('bookings.form_real', [
                'buttonText' => 'Continue'
            ]) 
        </form>
    </div>
    </div>

@endsection
