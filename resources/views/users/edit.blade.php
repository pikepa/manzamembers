@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-1/2 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit User Details
        </h1>

        <form 
                method="POST"
                action="{{ $user->path() }}"
        >
            @method('PATCH')

            @include ('users.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
    </div>

@endsection