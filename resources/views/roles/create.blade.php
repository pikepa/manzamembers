@extends('layouts.app')

@section('title', 'Add Role')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-2/3 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-4 text-center">
            New Role
        </h1>
        <form
            method="POST"
            action="/roles"
        >
            @include ('roles.form', [
                'role' => new App\Role,
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection