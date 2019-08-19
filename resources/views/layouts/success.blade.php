@if(session('success'))
    <div class="w-2/3 mx-auto text-center mb-4 rounded p-2 text-green-700 font-bold border-green-700 border-solid border-2">
        {{session('success')}}
    </div>  
@endif
