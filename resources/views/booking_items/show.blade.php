@extends('layouts.app')

@section('title', 'Make Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto md:w-3/5">
    <div class=" mx-auto card rounded shadow">

        @include('messages')

        <h1 class="text-2xl font-normal mb-2 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>
          <div class="mt-2 md:w-2/3 mx-auto flex items-center">
              <div class="bg-gray-400  py-2 px-4 border border-grey-light font-semibold">
                Qty
              </div>                    
              <div class="flex-1 bg-gray-400  py-2 px-4 border border-grey-light font-semibold">
                Ordered Tickets
              </div>
              <div class="bg-gray-400 text-center py-2 px-4 border border-grey-light font-semibold">Cost</div>
          </div>
                @foreach($orders as $order)
                   <div class="md:w-2/3 mx-auto  ">
                        <div class="flex border border-grey-light items-center">
                            <div class=" py-2 px-4 text-center ">{{ $order->qty}}</div>
                            <div class=" py-2 px-4  ">
                                @if($order->priceitems['memb'] === 0)Non-Member - @else Member - @endif 
                                {{ $order->category['category']}}
                            </div>
                            <div class="text-right py-2 px-6 border border-grey-light ">{{ $order->display_cost }}</div>
                            
                        </div>
                    @include('layouts.partials.icons._delete',['variable' => $order->path()])

                    </div>
                 @endforeach
                <div class="mt-8 md:w-2/3 mx-auto ">
                    <div class="control">
                        <a href="/checkout" class="btn btn-manza is-link mr-2">Checkout</a>
                        <a href="/" class="text-default">Cancel</a>
                    </div>
                 </div>
            </div>

        <div class=" mx-auto">
        </div>
        <div class=" pb-4 mx-auto flex flex-col md:flex-row justify-center card">
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