@extends('layouts.app')

@section('title', 'Memberships')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('success')
                    <h1 class="font-bold text-3xl m-2 ">Memberships</h1>
                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Date Joined</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Member No.</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Status</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Membership</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Term</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Name</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Mobile</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($memberships as $membership)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-r border-grey-light">{{ $membership->formatted_date_joined }}</td>
                          <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $membership->memb_no }}</td>
                          <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $membership->status }}</td>
                          <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $membership->mship->category }}</td>
                          <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $membership->mship->category }}</td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light"><a href="{{ $membership->path() }}">{{ $membership->surname }}</a></td>
                          <td class="py-4 px-6 border-b border-r  border-grey-light"><a href="{{ $membership->path() }}">{{ $membership->phone }}</a></td>
                          <td class=" border-b border-r  border-grey-light">
                            <div class="flex justify-around px-4">
                                <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $membership->path() }}" ><i class="far fa-arrow-alt-circle-up"></i></a></div>
                                <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $membership->path() }}/edit" ><i class="far fa-edit"></i></a></div>
                                <div class="text-grey-lighter text-sm mr-2 ">
                                    <form method="POST" action="{{ $membership->path() }}" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
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
