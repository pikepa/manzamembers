@extends('layouts.app')

@section('title',  'Home')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">
        <div class="flex justify between">
            @include('dashboard.components.dash_left')

            @include('dashboard.components.dash_main')
        </div>
    </div>

@endsection