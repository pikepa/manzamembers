@extends('layouts.app')

@section('title', 'Add Address')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-2/3 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-4 text-center">
            New Address
        </h1>
        <form
            method="POST"
            action="/address"
        >
            @include ('addresses.form', [
                'address' => new App\Address,
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection