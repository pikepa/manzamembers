{{-- views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Bookings')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

       {{--     @include('dashboard.components.dash_left')  --}}

            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('messages')
                    <h1 class="font-bold text-3xl m-2 ">{{$event->title}} Bookings</h1>
                    <h1 class="font-bold text-3xl m-2  >Today is 19th November 2019</h1>
                    <p><a href='{{ $event->id }}/orders'>View Orders</a></p>
                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white  rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Booking Date</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Name</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Org. </th>
      {{--                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">No. Tickets</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">No. Tables</th>  --}}
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Amount</th>
                          <th class="py-2 bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border  border-grey-light">Date Paid</th>
                          <th class="py-2 bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border  border-grey-light">Tickets</th>
                          <th class="py-2 bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border  border-grey-light">Table No.</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                      {{ $total = 0;}}
                      @endphp
                        @foreach($bookings as $booking)
                        <tr class="hover:bg-grey-lighter">
                          <td class=" py-4 px-4 border border-grey-light">{{ $booking->getFormattedDate('created_at')}}</td>
                          <td class="underline py-4 px-4 border border-grey-light"><a href="/booking/{{ $booking->id }}"> {{ $booking->name}}</td></a>
                          <td class="py-4 px-4 border border-grey-light text-left">{{ $booking->add_info}}</td>
      {{--                <td class="py-4 px-4 border border-grey-light text-center">{{ $booking->booking_items->sum('qty') }}</td>
                          <td class="py-4 px-4 border border-grey-light text-center"></td>      --}}
                          <td class="py-4 px-4 border border-grey-light text-center">RM {{number_format($booking->booking_items->sum('cost')/100,2,'.', ',') }}</td>
                          @if($booking->confirmed_at !== null)
                              <td class="py-4 px-4 border border-grey-light text-center">{{ $booking->getFormattedDate('confirmed_at')}}</td>
                          @else
                              <td class="text-center py-2 px-2 border border-grey-light text-red-600 font-extrabold uppercase">Not Paid</td>
                          @endif
                          <td class="py-4 px-4 border border-grey-light text-center">{{ $booking->booking_items->sum('seats')}}</td>
                          <td class="py-4 px-4 border border-grey-light text-center">{{ $booking->table_no}}</td>
                          <td class=" flex flex-row border-t border-r pt-4  border-grey-light">
                            @auth()
                              @can('booking-edit')
                                <div class="text-grey-lighter text-center text-sm mx-2 ">
                                    <a href="{{ $booking->path() }}/edit"><i class="fas fa-utensils"></i></a>
                                </div>
                              @endcan
                            <div class="text-grey-lighter text-center text-sm mx-2 ">
                              @can('booking-delete')
                                  <form method="POST" action="{{ $booking->path() }}" >
                                      @method('DELETE')
                                      @csrf
                                      <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
                                  </form>
                              @endcan
                            </div>
                            @endauth
                          </td>
                          @if($booking->getFormattedDate('confirmed_at') !== null)
                            @php
                            {{ $total = $total + $booking->booking_items->sum('seats'); }}
                            @endphp
                           @endif
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  <p>No. of Bookings:-{{ $bookings->count() }}</p><br>
                  <p>No. of Paid Seats:-{{ $total }}</p>
                </div>
                </div>
            </div>
          </div>
         </div>
    </div>

@endsection
