@extends('layouts.app')

@section('title', 'Create a new Permission')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-1/3 lg:mx-auto bg-card p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            New Permission
        </h1>

        <form
            method="POST"
            action="/permissions"
        >
            @include ('permissions.form', [
                'permission' => new App\Permission,
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection