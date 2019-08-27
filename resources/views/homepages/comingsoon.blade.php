@extends('layouts.app')

@section('title', 'Sorry Coming Soon')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto w-4/5 pb-4">

        <div class="flex flex-col md:flex-row justify-between">
            @include('dashboard.components.dash_left')
            
            <div class="flex flex-col text-center  mx-auto pb-4">
                <div class="">
                    <h1 class="font-bold text-3xl m-2 ">New Feature Coming Soon</h1>
                </div>
                <div class=" mb-4  mx-auto ">
                    <img class="  " src="{{URL::asset( '/images/smiley.jpg')}}">
                </div> 
                <div class="text-center">
                  <a href="{{ url()->previous() }}"> <h1 class="font-bold text-3xl m-2 ">Back</h1></a>
                </div>               
            </div>

         </div>
    </div>

@endsection
