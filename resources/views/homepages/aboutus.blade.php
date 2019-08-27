@extends('layouts.app')

@section('title', 'About Us')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto w-4/5 pb-4">

        <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto w-4/5 pb-4">
                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">About MANZA</h1>
                </div>
                <div class="flex flex-col md:flex-row ">
                    <div class="flex flex-col flex-1  items-center ml-4 ">
                        <div class="text-base p-4">
                            <div class="text-justify text-lg">
                                 <p class="pb-2">MANZA (Malaysian, Australian and New Zealand Association) is a volunteer run non-profit social expat organisation based in Kuala Lumpur, Malaysia.</p>
                                 <p class="pb-2">MANZA aims to support its new members in settling into life in Kuala Lumpur and provide all our members with lots of opportunities to get involved in social activities and events.  Getting involved with MANZA is a great way to meet new people and many lasting friendships have been formed between our members.</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>

@endsection
