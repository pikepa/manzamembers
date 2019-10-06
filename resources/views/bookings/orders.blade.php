@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class=" mx-auto mt-10 card rounded shadow">

        @include('messages')

        <h1 class="text-2xl font-normal mb-6 text-center">
            {{ $eventbooking->title }} - {{ $eventbooking->date_of_event }}
        </h1>
        @foreach($orders as $priceitem => $orders_list)
          <div class="mt-2 md:w-4/5  mx-auto flex justify-between items-center">
                <div class="bg-gray-400 w-64  py-2 px-2 text-center border border-grey-light font-semibold">
                    Name
                </div>
                <div class="bg-gray-400 w-12  py-2 px-2 text-center border border-grey-light font-semibold">
                    Qty
                </div>                    
                <div class="flex-1 bg-gray-400 text-center py-2 px-2 border border-grey-light font-semibold">
                    Orders
                </div>
                <div class="bg-gray-400 w-2/5 md:w-1/5 text-center py-2 px-2 border border-grey-light font-semibold">
                  Cost
                </div>
                <div class="bg-gray-400 w-2/5 md:w-1/5 md:mr-1 text-center py-2 px-2 border border-grey-light font-semibold">
                  Paid
                </div>
          </div>
                @foreach($orders_list as $order)
                        <div class="md:w-4/5 mx-auto flex items-center">
                            <div class="w-64 curser:pointer underline py-2 px-4 text-left border border-grey-light "><a href='{{ $order->booking->path() }}'>{{ substr($order->booking->name,0,25)}}</a></div>
                            <div class="w-12 py-2 px-4 text-center border border-grey-light ">{{ $order->qty}}</div>
                            <div class="flex-1 py-2 px-4 border border-grey-light ">
                                @if($order->priceitems['memb'] === 0)Non-Member - 
                                @elseif($order->priceitems['memb'] === 0)Member - 
                                @else  
                                @endif 
                                {{ $order->category['category']}}
                            </div>
                            <div class=" text-right w-2/5 md:w-1/5 py-2 px-2 border border-grey-light ">{{ $order->display_cost }}</div>
                            @if($order->booking->confirmed_at !== null)
                                <div class="md:mr-1 text-right w-2/5 md:w-1/5 py-2 px-2 border border-grey-light ">{{ $order->booking->confirmed_at->format('d-m-Y') }}</div>
                            @elseif($order->booking->confirmed_at == null)
                                <div class="md:mr-1 text-center w-2/5 md:w-1/5 py-2 px-2 border border-grey-light text-red-600 font-extrabold uppercase ">Not Paid</div>
                            @endif
                        </div>
                @endforeach
                <br>
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
                        <div class="bg-gray-400 w-2/5 md:w-1/5 md:mr-1 text-center py-2 px-2 border border-grey-light font-semibold">
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
                        <p></p>
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
   
    </div>

@endsection