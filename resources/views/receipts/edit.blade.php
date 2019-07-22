@extends('layouts.app')

@section('title', 'Edit Receipt')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-1/2 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit Receipt Details
        </h1>

        <form 
                method="POST"
                action="{{ $receipt->path() }}"
        >
            @method('PATCH')

            @include ('receipts.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
    </div>

@endsection