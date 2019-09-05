{{-- \resources\views\users\index.blade.php --}}

@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">
         <div class="flex flex-col md:flex-row justify-between">

      {{--       @include('dashboard.components.dash_left') --}}
            
            <div class="container mx-auto pb-4">

                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">User Administration</h1>
                </div>
                <div class="flex flex-col ">
                <div class="w-4/5 mx-auto">
                <div class="flex flex-row justify-end">
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="\users\create" ><i class="fas fa-plus"></i> User</a></div>
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="/roles">Roles</a></div>
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="/permissions">Permissions</a></div>
                </div>
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Name</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Email</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Date/Time Added</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">User Roles</th>
                          <th span:2 class="py-4  bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border border-grey-light">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-grey-lighter">
                              <td class="py-2 px-4 border border-grey-light">{{ $user->name }}</td>
                              <td class="py-2 px-4 border border-grey-light">{{ $user->email }}</a></td>
                              <td class="py-2 px-4 border  border-grey-light">{{ $user->created_at->format('F d, Y h:ia') }}</td>
                              <td class="py-2 px-4 border  border-grey-light">{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                              <td class="py-2 border border-grey-light flex flex-row align-center justify-around" > 
                              <div class=" hover:font-semibold"><a href="{{ route('users.edit', $user->id) }}" ><i class="far fa-edit"></i></a></div>
                              <div class=" hover:font-semibold">
                                    <form method="POST" action="{{ $user->path() }}" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
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
