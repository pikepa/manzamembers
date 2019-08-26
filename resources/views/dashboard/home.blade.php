@extends('layouts.app')

@section('title',  'Home')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto w-4/5 pb-4">
        @include('messages')
        <div class="flex flex-col md:flex-row justify-between">
            @include('dashboard.components.dash_left')
            @include('dashboard.components.dash_main')
        </div>
    </div>

@endsection