@extends('layouts.app')

@section('title', 'Events')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">Upcoming Events</h1>
                </div>
                <div class="flex flex-col ">
                    <div class="w-4/5 mx-auto">
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Date</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Title</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Price</th>
                          <th class="py-4  bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border-t  border-b border-grey-light">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($events as $event)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-r border-grey-light">{{ $event->Date_of_event }}</td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light">{{ $event->title }}</td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light">RM {{ number_format($event->price/100,2,'.', ',')}}</td>
                          <td class=" border-b border-r  border-grey-light">
                              <div class="text-center mx-auto ">
                                  <a class="button bg-pink-700 hover:bg-pink-500 font-bold text-white" href="/coming_soon">Book Me</a>
                              </div>

{{--  
                          <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $event->path() }}" ><i class="fab fa-readme"> Read</i></a></div>

                          <div class="text-grey-lighter text-sm mr-2 ">
                                <form method="POST" action="{{ $event->path() }}" >
                                    @method('DELETE')
                                    @csrf
                                    <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>--}}
                          </td>
                        </tr>
                        @endforeach
 
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
            </div>

         </div>
    </div>

@endsection
