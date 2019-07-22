@extends('layouts.app')

@section('title', 'Membership Details')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class=" mt-6 lg:w-4/5 lg:mx-auto ">
        <div class="">
            <h1 class="text-2xl text-gray-700 font-bold pb-4 text-center">
                Membership No. {{ $membership->memb_no }} / <span class="uppercase">{{ $membership->surname }}</span>
            </h1>
        </div>
            @include('memberships.form')
        <div class="flex-1 text-sm ml-4 py-4">
            <p><a class="no-underline hover:font-semibold"  href="{{ url()->previous() }}" ><i class="fas fa-backward"></i> Back</a></p>
        </div>
    </div>
</div>


@endsection