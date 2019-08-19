@if ($errors->{ $bag ?? 'default' }->any())
    <ul class="w-2/3 mx-auto mb-4 rounded p-2 text-center text-red-700 font-bold border-red-700 border-solid border-2">
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </ul>
@endif