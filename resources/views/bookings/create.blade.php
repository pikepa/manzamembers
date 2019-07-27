@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-2/3 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit Event Details
        </h1>

        <form 
                method="POST"
                action="{{ $event->path() }}"
        >
            @method('PATCH')

            @include ('events.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
    </div>

@endsection