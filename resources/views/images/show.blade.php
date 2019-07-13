@extends('layouts.app')

@section('content')

<header>


</header>

<main class="flex flex-wrap  py-4">
        <div class="w-3/5 mx-auto px-2 py-2">
            <div class="card flex-grow  overflow-hidden" >
                <img class="w-full rounded" src="{{$image->geturl('full')}}" alt="{{$image->name}}">
            </div>
        </div>

</main>
    

@endsection

@section('scripts')
             
@endsection