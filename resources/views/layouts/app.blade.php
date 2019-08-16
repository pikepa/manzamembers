<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.partials.meta')

    @yield('addstyles')

    @include('layouts.partials.css')

</head>

<body class="font-sans antialiased">

<div id="app">
    @include('layouts.partials.nav')
    
    @yield('content')

</div>
@include('layouts.partials.scripts')
</body>
</html>
