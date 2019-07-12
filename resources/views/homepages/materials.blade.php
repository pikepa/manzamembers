@extends('layouts.app')

@section('title', 'Use of Materials')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            @include('dashboard.components.dash_left')
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                    <h1 class="font-bold text-3xl m-2 ">Use of Materials</h1>
                </div>
                <div class="flex flex-col md:flex-row ">
                    <div class="card mx-auto px-4 mx-2">
                       <img class="rounded-lg border-white border-8" src="{{URL::asset('images/materials.jpg')}}" width=350px  alt="Profile Pic">
                    </div>

                    <div class="flex flex-col flex-1  items-center ml-4 ">
                        <div class="text-base p-4">
                            <div class="text-justify text-lg">
                                <p class="pb-2">My real love is making sculptures using old newspapers (to make paper pulp), paper clay, cardboard and othery recycled materials.</p>
                                <p class="pb-2">Working three-dimensional is so much more inspiring than a flat canvas to start with. But because the time it takes to create a sculpture (the amount of layers and drying time between layers and of paper pulp) it is great to be able to work on canvas too.</p>
                                <p class="pb-2">And sometimes I use a wall as my canvas.</p>
                                <p class="pb-2">When making paper pulp for my sculptures items are included to make sure the  artwork is long lasting.</p>
                                <p class="pb-2">All art is painted with quality acrylics and varnish (mostly Amsterdam & Expert acrylics from Royal Talens in Holland).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>

@endsection
