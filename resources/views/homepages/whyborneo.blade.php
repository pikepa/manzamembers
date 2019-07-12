@extends('layouts.app')

@section('title', 'Why Borneo')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">Why Borneo ?</h1>
                </div>
                <div class="flex flex-col ">
                    <div class=" ml-4 mb-2 ">
                        <div class="text-base p-4 ">
                            <div class="text-justify text-lg">
                                <p class="pb-2">Why did you choose Borneo to retire? This is a question that people have asked me many times. For many people Borneo still sounds very ” exotic” and “jungle”-like. For me and my husband the state of Sabah is the most beautiful state of Malaysia.</p>
                                <p class="pb-2"> Sabah is located on the island of Borneo and has everything we like. Driving just a few miles out if town you can see the most stunning scenery and uniquely beautiful plants and animals. The flora and fauna of Sabah inspire me every day!</p>
                                <p class="pb-2"> On the other hand we have KK (Kota Kinabalu), a big vibrant city with inspiring scenes everywhere!</p>

                            </div>
                        </div>
                    </div>
                    <div class="card mx-auto px-4 mx-2">
                       <img class="rounded-lg border-white border-8" src="{{URL::asset('images/mntkk.jpg')}}" width=450px  alt="Profile Pic">
                    </div>
                    <div class=" ml-4 mb-2 ">
                        <div class="text-base p-4 ">
                            <div class="text-justify text-lg">
                                <p class="pb-2">Our love for Malaysia started in 2000 when we had the privilege to get married in Langkawi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row content-between">
                        <div class="card mx-auto px-4 mx-2">
                           <img class="rounded-lg border-white border-8" src="{{URL::asset('images/wedding.jpg')}}" width=450px  alt="Profile Pic">
                        </div>
                        <div class="card mx-auto px-4 mx-2">
                           <img class="rounded-lg border-white border-8" src="{{URL::asset('images/sunset.jpg')}}" width=450px  alt="Profile Pic">
                        </div>
                    </div>
                    <div class=" ml-4 mb-2 ">
                        <div class="text-base p-4 ">
                            <div class="text-justify text-lg">
                                <p class="pb-2">We fell in love with the beauty, people, culture and weather of Malaysia.</p>
                                <p class="pb-2">We visited all states and finally made our choice to settle in Sabah; famous for its beautiful sunsets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>

@endsection
