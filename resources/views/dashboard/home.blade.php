@extends('layouts.app')

@section('title',  'Home')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4 ">
        @include('messages')
        <div class="flex flex-col md:flex-row justify-between">
            @auth
                @include('dashboard.components.dash_left')
            @endauth
            @include('dashboard.components.dash_main')
        </div>
    </div>

@endsection