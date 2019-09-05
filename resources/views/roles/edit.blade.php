@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-2/3 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit Role Details
        </h1>

        <form 
                method="POST"
                action="/roles/{{ $role->id }}"
        >
            @method('PATCH')

            @include ('roles.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
    </div>

@endsection