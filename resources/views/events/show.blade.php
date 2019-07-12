@extends('layouts.app')

@section('title', 'Read Message')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="card mt-6 lg:w-1/2 lg:mx-auto  rounded shadow">
        <div class="bg-blue-100">
            <h1 class="text-2xl font-normal pb-4 text-center">
                Message
            </h1>
        </div>
        <div class="text-xl bg-blue-100  ">
            <div class="flex mb-2 ">
              <div class="w-1/5  text-right font-semibold ">From:-</div>
              <div class="flex-1 pl-4 ">{{ $message->name }}</div>  
            </div>
            <div class="flex mb-2">
              <div class="w-1/5  text-right font-semibold ">Email:-</div>
              <div class="flex-1 ml-4">{{ $message->email }}</div>  
            </div>
            <div class="flex mb-2">
              <div class="w-1/5  text-right font-semibold ">Subject:-</div>
              <div class="flex-1 ml-4">{{ $message->subject }}</div>  
            </div>
            <div class="flex mb-2">
              <div class="border-t-2 w-1/5  text-right font-semibold ">Message:-</div>
              <div class="border-t-2 flex-1 ml-4">{!! nl2br($message->content) !!}</div>  
            </div>
            <div class="flex-1 text-sm ml-4 py-4">
                <p><a class="no-underline hover:font-semibold"  href="{{ $url = '/message' }}" ><i class="fas fa-backward"></i> Back</a></p>
            </div>
        </div>
    </div>
</div>

@endsection