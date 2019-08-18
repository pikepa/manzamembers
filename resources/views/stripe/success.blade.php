@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="lg:w-1/2 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-4 text-center">
            Success your payment has been made and tickets reserved
       </h1>
   </div>
</div>
@endsection
