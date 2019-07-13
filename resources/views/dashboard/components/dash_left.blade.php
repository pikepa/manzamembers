<div class="font-sans card bg-grey-light mx-4 mt-4 md:ml-0 md:w-1/6">
    
    <div class="mb-2 mt-12">
        <ul class="">
            <li><a href="{{ url('/') }}" class="my-2 font-semibold hover:font-bold no-underline">Home</a></li>
            <li class="ml-4"><a href="{{ url('/aboutus') }}" class="hover:font-semibold no-underline">About Us</a></li>
            <li class="ml-4"><a href="{{ url('/message/create') }}" class="hover:font-semibold no-underline">Contact Us</a></li>   

    {{--          <li><a href="{{ url('/whyborneo') }}" class="hover:font-semibold no-underline">Why Borneo</a></li>
            <li><a href="{{ url('/materials') }}" class="hover:font-semibold no-underline">Use of Materials</a></li>
    --}}    </ul>
    </div>
   <div class="mb-2">
        <div>
            <h4 class="my-2 font-bold">
                Membership
            </h4>
        </div>
         <ul class="">
                <li class="ml-4"><a href="{{ url('/coming_soon') }}" class="hover:font-semibold no-underline">Join MANZA</a></li>   
{{--
          @forelse($categories as $category) 
            <li><a href="{{ url('/bycategory/'. $category->id ) }}" class="hover:font-semibold">{{ $category->category }}</li></a>
          @empty
            <div class=" mx-2"> No Pictures Yet</div>
          @endforelse 
              --}}
        </ul>    
 
    <div class="mb-2">
        <div>
            <h4 class="my-2 font-bold">
                Events
            </h4>
        </div>
        <ul class="">
       {{--      <li><a href="{{ url('/') }}" class="hover:font-semibold no-underline">All works of Art</a></li>
            <li><a href="{{ url('/status/For Sale') }}" class="hover:font-semibold">Available for Sale</a></li>
            <li><a href="{{ url('/status/Sold') }}" class="hover:font-semibold">Sorry Sold Already</a></li>
 --}}       <li class="ml-4"><a href="{{ url('/event') }}" class="hover:font-semibold no-underline">Event Listing</a></li>
 
            <br>
            @guest
                <li class="hover:font-semibold ml-4"><a href="{{ url('login') }}"></i>Sign In</a></li>
            @endguest
        </ul> 
            @auth 
            <div>
            <h4 class="my-2 font-bold">Admin</h4>
        </div>
            <ul>
                <li class="hover:font-semibold ml-4">
                    <a href="{{ url('/coming_soon') }}" class="hover:font-semibold no-underline">Add New Event.</a>
                </li>
                <li class="hover:font-semibold ml-4">
                    <a href="{{ url('/message') }}" class="hover:font-semibold no-underline">Show Messages.</a>
                </li>
                <li class="hover:font-semibold ml-4">
                    <a href="{{ url('/category') }}" class="hover:font-semibold no-underline">Categories.</a>
                </li>
            </ul>
                <br>
                <a href="{{ route('logout') }}"
                    class="hover:font-semibold no-underline ml-4"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>  
            @endauth
    </div>
</div>
</div>