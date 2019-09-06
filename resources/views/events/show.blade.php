@extends('layouts.app')

@section('title', 'Event')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container  mx-auto lg:w-1/2">    {{-- container taken from here --}}
    <div class="card mt-6  mx-auto  rounded shadow">
        <div class="  ">
            <h1 class="text-3xl font-semibold mt-2 pb-4 text-center">
                {{ $event->title }}
            </h1>
        </div>
        <div class=" text-lg  ">
            <div class="flex flex-col md:flex-row">
                <div class="">
                  @if(isset($event->media))
                     <div class=" max-w-md card mx-auto">
                               <img class="w-full object-cover object-centre" src="{{URL::asset( $event->featured_img)}}">  
                      </div>
                  @endif 
                </div>
                <div class="">
                  <div class="p-2">{!! nl2br($event->description) !!}</div>  
                </div>
            </div>
              <div class="ml-2">
                  <div class="flex mb-2 pt-2">
                    <div class="font-semibold ">Venue: </div>
                    <div class="ml-2">{{ $event->venue}}</div>
                  </div>
                  <div class="flex mb-2 pt-2">
                      <div class="font-semibold ">Address:  </div>
                      <div class="ml-2">{!! nl2br($event->v_address) !!}</div>
                  </div>
                  <div class="flex mb-2 pt-2">
                    <div class="font-semibold ">Date: </div>
                    <div class="ml-2">{{ $event->date_of_event }}</div>
                  </div>
                      <div class="flex justify-between mb-2 pt-2">
                        <div class="flex" >
                            <div class="font-semibold ">From: </div>
                            <div class="ml-2">{{ $event->timing}}</div>
                        </div> 
                      @auth 
                        <div>
                          <a href="{{ $event->path() }}/edit" ><i class="far fa-edit"></i></a>
                        </div>
                      @endauth
                      </div>
              </div>
          </div>
     </div>

        <div class="flex flex-row p-2 justify-between items-center border-t-2 ">
            @if($event->isPublished()) 
              @if($event->status !== 'Sold Out') 
                @if( $event->bookings_only  !== "Bookings Only" || $event->memb_na  == "memb_na")
                    <div class="mb-4 text-left  font-semibold ">Ticket Prices: </div>
                            <div class=" button btn btn-manza h-10"><a href="/eventbooking/create/{{ $event->id }}" >Book Now</a></div>
                @else
                    <div class="mx-auto button btn btn-manza h-10"><a href="/reservation/create/{{ $event->id }}" >Register Now</a></div>
                @endif
              @endif
            @endif
        </div>

        <div class=" card">
          @if($event->status !== 'Sold Out') 
            @if( $event->bookings_only !== "Bookings Only" || $event->memb_na  == "memb_na")
                @include('events.partials._pricing')
            <div class="m-2">
              <p>NM = Non Members</p>
            </div>
            @endif
            @endif
        </div>
            <div class="flex-1 text-sm ml-4 py-4">
              @include('layouts.partials.icons._back')
            </div>
        </div>
    </div>
</div>

@endsection