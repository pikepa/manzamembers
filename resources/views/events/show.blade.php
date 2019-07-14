@extends('layouts.app')

@section('title', 'Read Message')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="card mt-6 lg:w-3/5 mx-auto  rounded shadow">
        <div class="bg-blue-100">
            <h1 class="text-3xl font-semibold mt-2 pb-4 text-center">
                {{ $event->title }}
            </h1>
        </div>
        <div class="text-xl bg-blue-100  ">
            <div class="flex mb-2 ">
              <div class="flex-1 pl-4 ">{{ $event->description }}</div>  
            </div>
            <div class="flex mb-2">
              <div class="w-1/6  text-right font-semibold ">Venue: </div>
              <div class="ml-4">MANZA House, 38 Bukit Pantai</div>  
            </div>
            <div class="flex mb-2">
              <div class="w-1/6  text-right font-semibold ">Date: </div>
              <div class="ml-4">{{ $event->date_of_event }}</div>  
              <div class="ml-4  text-left font-semibold ">From: </div>
              <div class="ml-4">2pm</div>  
              <div class="ml-1  text-left font-semibold ">-</div>
              <div class="ml-2">7pm</div>  
            </div>
            <div class="w-1/4 pl-4 text-left  font-semibold ">Ticket Prices: </div>
            <div class="ml-12 flex items-center">
                <div class="py-2 px-6 border-b border-r border-grey-light"><a href="\priceitem\create" ><i class="fas fa-plus"></i></a></div>
                <div class="py-2 px-6 border-b border-r border-grey-light bg-red-400">
                  Ticket Type
                </div>
                <div class="py-2 px-6 border-b border-r border-grey-light bg-blue-400">RM 200</div>
            </div>
            <div class="flex-1 text-sm ml-4 py-4">
                <p><a class="no-underline hover:font-semibold"  href="{{ $url = '/event' }}" ><i class="fas fa-backward"></i> Back</a></p>
            </div>
        </div>
    </div>
</div>

@endsection