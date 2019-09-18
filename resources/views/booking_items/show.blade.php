@extends('layouts.app')

@section('title', 'Make Booking')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto md:w-1/2">
    <div class=" mx-auto mt-4 card rounded shadow">

        @include('messages')

        <h1 class="text-2xl font-normal mb-2 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>
          <div class="mt-2  md:w-4/5 mx-auto flex items-center">
              <div class="bg-gray-400 w-1/6 md:w-1/6 py-2 px-2 text-center border border-grey-light font-semibold">
                Qty
              </div>                    
              <div class="w-1/2 bg-gray-400 text-center py-2 px-2 border border-grey-light font-semibold">
                Orders
              </div>
              <div class="bg-gray-400 w-2/5 md:w-1/4 md:mr-8 text-center py-2 px-2 border border-grey-light font-semibold">Cost</div>
          </div>
                @foreach($orders as $order)
                   <div class="md:w-4/5 mx-auto  ">
                        <div class="flex  items-center">
                            <div class="w-1/6 py-2 px-4 text-center border border-grey-light ">{{ $order->qty}}</div>
                                <div class="w-1/2 py-2 px-4 border border-grey-light ">
                                    @if($order->priceitems['memb'] === 0)Non-Member - 
                                    @elseif($order->priceitems['memb'] === 0)Member - 
                                    @else  
                                    @endif 
                                    {{ $order->category['category']}}
                                </div>
                            <div class="md:mr-1 text-right w-2/5 md:w-1/4 py-2 px-2 border border-grey-light ">{{ $order->display_cost }}</div>
                        @include('layouts.partials.icons._delete',['variable'=>$order->path()])
                        </div>
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
          @if(session::get('memb_required') !== "NO")
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
            @elseif(session::get('memb_required') == "NO")
            <div> 
                <form 
                        method="POST"
                        action="/bookingitems"
                >
                    @include ('booking_items.other_form', [
                        'buttonText' => 'Add'
                    ]) 
                </form>
            </div>

            @endif
        </div>     
    </div>

@endsection