@extends('layouts.app')

@section('title', 'Event')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="card mt-6 lg:w-3/5 mx-auto  rounded shadow">
 
        <div class="  ">
            <h1 class="text-3xl font-semibold mt-2 pb-4 text-center">
                {{ $event->title }}
            </h1>
        </div>
        <div class="text-lg  ">
            <div class=" flex">
              <div class="">
                @if(isset($event->featured_img))
                   <div class=" max-w-md card mx-auto">
                             <img class="w-full object-cover object-centre" src="{{URL::asset( $event->featured_img)}}">  
                    </div>
                @endif 
              </div>
                <div class="flex mb-2 ">
                  <div class="flex-1 pl-4 ">{!! nl2br($event->description) !!}</div>  
                </div>
            </div>
            <div class="flex mb-2 pt-2">
              <div class="w-1/6 text-right font-semibold ">Venue: </div>
              <div class="ml-4">{{ $event->venue}}
            </div>
          </div>
          <div class="flex mb-2 pt-2">
              <div class="w-1/6 text-right font-semibold ">Address:  </div>
              <div class="ml-4">{!! nl2br($event->v_address) !!}</div>
          </div>
            <div class="flex mb-2 pt-2">
              <div class="w-1/6  text-right font-semibold ">Date: </div>
              <div class="ml-4">{{ $event->date_of_event }}</div>
            </div>
            <div class='flex justify-between'>
                <div class="flex w-1/2 mb-2 pt-2">
                  <div class="w-1/3 text-right font-semibold ">From: </div>
                  <div class="ml-4">{{ $event->timing}}</div> 
                </div>
                @auth 
                <div>
                  <a href="{{ $event->path() }}/edit" ><i class="far fa-edit"></i></a>
                </div>
                @endauth
            </div>
     </div>

          @if($event->isPublished())
            <div class="flex flex-row justify-between items-center border-t-2 ">
                @if( $event->bookings_only !== "Bookings Only")
                    <div class=" pt-4 pl-4 mb-4 text-left  font-semibold ">Ticket Prices: </div>
                    <div class=" button btn btn-manza h-10"><a href="/eventbooking/create/{{ $event->id }}" >Book Now</a></div>
                @else
                    <div class="mx-auto mt-4 button btn btn-manza h-10"><a href="/eventbooking/create/{{ $event->id }}" >Book Now</a></div>
                @endif
            </div>



            @if( $event->bookings_only !== "Bookings Only")
                <div class=" ml-12 flex items-center">
                        <div class="bg-gray-400 w-1/2 py-2 px-6 border-b border-r border-grey-light font-semibold">
                          Ticket Type
                        </div>
                        <div class="bg-gray-400 w-1/4 text-center py-2 px-6 border-b border-r border-grey-light font-semibold">Price</div>
                    @auth
                     <div class="bg-gray-400 py-2 px-6 border-b border-r border-grey-light"><a href="\priceitem\create\{{ $event->id }}" ><i class="fas fa-plus"></i></a></div>           
                    @endauth
                </div>
        @endif
                @foreach($priceitems as $item)
                    <div class="ml-12 flex items-center">
                        <div class="w-1/2 py-2 px-6 border-b border-r border-grey-light ">{{ $item->category->category}}</div>
                        <div class="w-1/4 text-right py-2 px-6 border-b border-r border-grey-light ">{{ $item->formatted_price }}</div>
                        <div class="border-b border-r border-grey-light" >
                          @auth
                            @include('layouts.partials.icons._delete',['variable'=>$item->path()])
                          @endauth                        
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="flex-1 text-sm ml-4 py-4">
              @include('layouts.partials.icons._back')
            </div>
        </div>
    </div>
</div>

@endsection