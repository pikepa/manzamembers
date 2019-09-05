{{-- \resources\views\roles\index.blade.php --}}

@extends('layouts.app')

@section('title', 'Roles')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">
         <div class="flex flex-col md:flex-row justify-between">

      {{--       @include('dashboard.components.dash_left') --}}
            
            <div class="container mx-auto pb-4">

                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">Permissions Administration</h1>
                </div>
                <div class="flex flex-col ">

                    <div class="w-4/5 mx-auto">
                <div class="flex flex-row justify-end">
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="\permissions\create" ><i class="fas fa-plus"></i> Permission</a></div>
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="/users">Users</a></div>
                  <div class="text-right text-grey-lighter text-lg mr-2 hover:font-semibold"><a href="/roles">Roles</a></div>
                </div>
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="w-1/3 py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Permission Name</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Roles</th>
                          <th span:2 class="w-1/6 py-4  bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border border-grey-light">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($permissions as $permission)
                            <tr class="hover:bg-grey-lighter">
                              <td class="py-2 px-4 border border-grey-light">{{ $permission->name }}</td>
                              <td class="py-2 px-4 border  border-grey-light">{{  $permission->roles()->pluck('name')->implode(' - ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                              <td class="py-2 border border-grey-light flex flex-row align-center justify-around" > 
                              <div class=" hover:font-semibold"><a href="{{ route('permissions.edit', $permission->id) }}" ><i class="far fa-edit"></i></a></div>
                              <div class=" hover:font-semibold">
                                <form method="POST" action="/permissions/{{$permission->id }}" >
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
