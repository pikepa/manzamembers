<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

  @include('layouts.partials.meta') @yield('addstyles') @include('layouts.partials.css')
    
  @yield('addstyles')

</head>

<body class="font-sans antialiased bg-pink-400">

  <div id="app">
    @include('layouts.partials.nav')
    <div class="">
         @yield('content')
    </div>
  </div>
</body>
@include('layouts.partials.scripts')
</html>