@extends('layouts.app')

@section('title', 'Edit the Category')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-1/3 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Category
        </h1>

        <form 
                method="POST"
                action="/permissions/{{ $permission->id }}"
        >
            @method('PATCH')

            @include ('permissions.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
    </div>

@endsection