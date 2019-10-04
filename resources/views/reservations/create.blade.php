@extends('layouts.app')

@section('title', 'New Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-1/2 lg:mx-auto card p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Make a Reservation
        </h1>

        <form
            method="POST"
            action="/reservation"
        >
            @include ('reservations.form', [
                'buttonText' => 'Register'
            ])
        </form>
    </div>
    </div>

@endsection