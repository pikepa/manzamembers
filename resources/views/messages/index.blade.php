@extends('layouts.app')

@section('title', 'Events')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto w-4/5 pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">Messages</h1>
                </div>
                <div class="flex flex-col ">
                    <div class="w-4/5 mx-auto">
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Date</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">From</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Email</th>
                          <th class="py-4  bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border-t  border-b border-grey-light">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($messages as $message)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-r border-grey-light">{{ $message->created_date }}</td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light">{{ $message->name }}</td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light">{{ $message->email }}</td>
                          <td class="flex justify-center py-4  border-b border-r  border-grey-light">
                            <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $message->path() }}" ><i class="fab fa-readme"> Read</i></a></div>
                            <div class="text-grey-lighter text-sm mr-2 ">
                                <form method="POST" action="{{ $message->path() }}" >
                                    @method('DELETE')
                                    @csrf
                                    <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
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
