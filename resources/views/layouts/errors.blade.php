@if(session('error'))
    <div class="w-2/3 mx-auto mb-4 rounded p-2 text-center text-red-700 font-bold border-red-700 border-solid border-2">
        {{session('error')}}
    </div>  
@endif
