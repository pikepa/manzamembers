@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="flex flex-col items-center lg:w-1/2 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <div class=" mb-4 align-center ">
            <img class="  " src="{{URL::asset( '/images/tick.png')}}" height=100px>
        </div>
        <h1 class="text-2xl font-normal mb-4 text-center">
            Success your payment has been made and tickets reserved.
       </h1>
        <h2 class="text-2xl font-normal mb-4 text-center">
            Thank you for using our online booking system.
       </h2>
        <div class="text-center">
            <a class="font-bold text-xl underline"href="{{$booking->receipt_url}}" target="_blank">Here is your receipt</a>
        </div>

   </div>

</div>
@endsection
