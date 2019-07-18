@extends('layouts.app')

@section('title', 'Add Member')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-1/2 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-4 text-center">
            New Member
        </h1>
        <form
            method="POST"
            action="/member"
        >
            @include ('members.form', [
                'member' => new App\Member,
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection