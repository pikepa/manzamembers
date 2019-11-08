<div class="bg-gray-400">
  <div class="container  mx-auto ">
    <div class=" flex justify-between items-center">
      <div>
          <a href="https://manza.org" target="_blank" rel="noopener">  <img class="" src="{{URL::asset('images/headerlogo-300x65.png')}}"  alt="Logo Pic"></a>
      </div>
      <div class="flex">
          <div class="block m-4">
              <a href="{{ url('/aboutus') }}" class="hover:font-semibold no-underline">About Us</a>
          </div>      
          <div class="block m-4">
              <a href="{{ url('/message/create') }}" class="hover:font-semibold no-underline">Contact Us</a>
          </div> 
          @guest     
              <div class="block m-4">
                <a class=" hover:font-semibold "href="{{ url('login') }}">Sign In</a>
              </div>
          @endguest
          @auth
              <div class="block m-4">
                    <a href="{{ route('logout') }}"
                    class="hover:font-semibold no-underline ml-2"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
              </div>
          @endauth
        </div>
    </div>


  </div>
</div>