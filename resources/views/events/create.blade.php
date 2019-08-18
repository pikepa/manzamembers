@extends('layouts.app')

@section('title', 'Message Me')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-3/5 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-4 text-center">
            New Event
        </h1>
        <form
            method="POST"
            action="/event"
        >
            @include ('events.form', [
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection