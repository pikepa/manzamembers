@extends('layouts.app')

@section('title', 'Make Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto w-3/5">
    <div class=" my-2 mx-auto card p-6  rounded shadow">

        @include('messages')

        <h1 class="text-2xl font-normal mb-2 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>
          <div class="mt-2 w-2/3 mx-auto flex items-center">
              <div class="bg-gray-400 w-16 py-2 px-4 border border-grey-light font-semibold">
                Qty
              </div>                    
              <div class="bg-gray-400 w-1/2 py-2 px-4 border border-grey-light font-semibold">
                Ordered Tickets
              </div>
              <div class="bg-gray-400 w-1/3 text-center py-2 px-6 border border-grey-light font-semibold">Cost</div>
          </div>
                @foreach($orders as $order)
                   <div class="w-2/3 mx-auto flex items-center">
                        <div class="w-16 py-2 px-4 text-center border border-grey-light ">{{ $order->qty}}</div>
                        <div class="w-1/2 py-2 px-4 border border-grey-light ">
                            @if($order->priceitems['memb'] === 0)Non-Member - @else Member - @endif 
                            {{ $order->category['category']}}
                        </div>
                        <div class="w-1/3 text-right py-2 px-6 border border-grey-light ">{{ $order->display_cost }}</div>
                        @include('layouts.partials.icons._delete',['variable' => $order->path()])
                    </div>
                 @endforeach
                <div class="mt-8 w-2/3 mx-auto ">
                    <div class="control">
                        <a href="/checkout" class="btn btn-manza is-link mr-2">Checkout</a>
                        <a href="/" class="text-default">Cancel</a>
                    </div>
                 </div>
            </div>

        <div class=" mx-auto">
        </div>
        <div class=" pb-4 mx-auto flex flex-row justify-center card pt-4">
            <div class=""> 
                <form 
                        method="POST"
                        action="/bookingitems"
                >
                    @include ('booking_items.memb_form', [
                        'buttonText' => 'Add'
                    ]) 
                </form>
            </div>
            <div> 
                <form 
                        method="POST"
                        action="/bookingitems"
                >
                    @include ('booking_items.non_memb_form', [
                        'buttonText' => 'Add'
                    ]) 
                </form>
            </div>
        </div>     
    </div>

@endsection