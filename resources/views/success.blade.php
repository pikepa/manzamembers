@if(session('message'))
    <div class="w-1/3 mx-auto mb-4 rounded p-2 text-green-700 font-bold border-green-700 border-solid border-2">
        {{session('message')}}
    </div>  

@endif
