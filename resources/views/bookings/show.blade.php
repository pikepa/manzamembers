@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto md:w-1/2">
    <div class=" mx-auto mt-10 card rounded shadow">

        @include('messages')

        <h1 class="text-2xl font-normal mb-6 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>
        @if(isset($booking->confirmed_at))
            <h1 class="text-2xl font-normal mb-6 text-center">
                {{ $booking->name }} - Paid on {{ $booking->confirmed_at->format('M jS, Y @ H:i') }} Hrs
            </h1>
            <h1 class="text-2xl font-normal mb-6 text-center">
                Booking Ref :- MAN10{{ $booking->id }}
            </h1>
        @endif
          <div class="mt-2  md:w-4/5 mx-auto flex justify-between items-center">
                <div class="bg-gray-400 w-1/6 md:w-1/6 py-2 px-2 text-center border border-grey-light font-semibold">
                    Qty
                </div>                    
                <div class="flex-1 bg-gray-400 text-center py-2 px-2 border border-grey-light font-semibold">
                    Orders
                </div>
                <div class="bg-gray-400 w-2/5 md:w-1/4 md:mr-1 text-center py-2 px-2 border border-grey-light font-semibold">
                  Cost
                </div>
          </div>
                @foreach($orders as $order)
                        <div class="md:w-4/5 mx-auto flex items-center">
                            <div class="w-1/6 py-2 px-4 text-center border border-grey-light ">{{ $order->qty}}</div>
                            <div class="flex-1 py-2 px-4 border border-grey-light ">
                                @if($order->priceitems['memb'] === 0)Non-Member - 
                                @elseif($order->priceitems['memb'] === 0)Member - 
                                @else  
                                @endif 
                                {{ $order->category['category']}}
                            </div>
                            <div class="md:mr-1 text-right w-2/5 md:w-1/4 py-2 px-2 border border-grey-light ">{{ $order->display_cost }}</div>
                        </div>
                @endforeach
                @if($cartreceipts->count() !==0 )
                         <h1 class="mt-12 text-2xl font-normal mb-6 text-center">
                            Receipt
                        </h1>
                    <div class="mt-2  md:w-4/5 mx-auto flex justify-between items-center">
                        <div class="bg-gray-400 w-1/5 md:w-1/5 py-2 px-2 text-center border border-grey-light font-semibold">
                            Receipt
                        </div>                    
                        <div class="flex-1 bg-gray-400 text-center py-2 px-2 border border-grey-light font-semibold">
                            Payee
                        </div>
                        <div class="bg-gray-400 w-2/5 md:w-1/4 md:mr-1 text-center py-2 px-2 border border-grey-light font-semibold">
                          Amount
                        </div>
                    </div>
                    @foreach($cartreceipts as $receipt)
                        <div class="md:w-4/5 mx-auto flex items-center">
                            <div class="w-1/5 py-2 px-4 text-center border border-grey-light ">{{ $receipt->receipt_no}}</div>
                            <div class="flex-1 py-2 px-4 border border-grey-light ">
                               {{ $receipt->payee }}
                            </div>
                            <div class="md:mr-1 text-right w-2/5 md:w-1/4 py-2 px-2 border border-grey-light ">{{ $receipt->display_amount }}</div>
                        </div>                    @endforeach
                @else
                    <div class="mt-10 text-center mx-auto text-2xl font-normal">
                        <p>Your receipt was created by stripe and has been sent by email</p>
                    </div>
                @endif
                @auth()
                    <div class="mt-8 md:w-4/5 mx-auto ">
                        <div class="control">
                            <a href="/byevent/{{ $eventbooking->id }}" class="text-2xl font-normal">Back</a>
                        </div>
                    </div>
                @endauth
            </div>
        
        <div class="mt-10 text-center mx-auto text-2xl font-normal">
            <p>Please print details of your order</p>
        </div>
   
    </div>

@endsection