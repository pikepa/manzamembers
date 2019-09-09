{{-- views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Reservations')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

       {{--     @include('dashboard.components.dash_left')  --}}  
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('messages')
                    <h1 class="font-bold text-3xl m-2 ">{{$event->title}} Reservations</h1>
                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white  rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Date Booked</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Name</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Mobile</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Email</th>
                          <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">No. of People</th>
                        </tr>
                      </thead
                      <tbody>
                        @foreach($reservations as $reservation)
                        <tr class="hover:bg-grey-lighter">
                          <td class=" py-4 px-4 border border-grey-light">{{ $reservation->created_at->format('M j, Y') }}</td>
                          <td class="py-4 px-4 border border-grey-light text-left">{{ $reservation->name}}</td>
                          <td class="py-4 px-4 border border-grey-light text-center">{{ $reservation->mobile }}</td>
                          <td class="py-4 px-4 border border-grey-light text-center">{{ $reservation->email }}</td>
                          <td class="py-4 px-4 border border-grey-light text-center">{{ $reservation->res_qty }}</td>
                            @auth()
                              @can('reservation-delete')
                                <td class="py-4 px-4 border border-grey-light text-center">                            
                                  <form method="POST" action="{{ $reservation->path() }}" >
                                      @method('DELETE')
                                      @csrf
                                      <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
                                  </form>
                                </td>
                              @endcan
                            </div>
                            @endauth
                          </td>
                        </tr>
                        @endforeach
 
                      </tbody>
                    </table>
                  </div>
                  <p>Reservations: {{ $reservations->count() }}</p>
                </div>
                </div>
            </div>
          </div>
         </div>
    </div>

@endsection
