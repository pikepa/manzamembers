<div class="font-sans card bg-grey-dark mx-4 mt-4 md:ml-0 md:w-1/6">
    
    <div class=" ml-4 mb-2 mt-6">
        <ul class="">
            <li><a href="{{ url('/') }}" class="my-2 font-semibold hover:font-bold no-underline">Home</a></li>
            <li class="ml-4"><a href="{{ url('/aboutus') }}" class="hover:font-semibold no-underline">About Us</a></li>
            <li class="ml-4"><a href="{{ url('/message/create') }}" class="hover:font-semibold no-underline">Contact Us</a></li>   
        </ul>
    </div>
   <div class="ml-4 mb-2">
        <div>
            <h4 class="my-2 font-bold">
                Membership
            </h4>
        </div>
        <ul class="">
            <li class="ml-4"><a href="{{ url('/coming_soon') }}" class="hover:font-semibold no-underline">Join MANZA</a></li>   
            @auth
                <li class="ml-4"><a href="{{ url('/membership') }}" class="hover:font-semibold no-underline">List Membership</a></li>
                <li class="ml-4"><a href="{{ url('/memberlisting') }}" class="hover:font-semibold no-underline">List Members</a></li>
                <li class="ml-4"><a href="{{ url('/receiptlisting') }}" class="hover:font-semibold no-underline">List Receipts</a></li>
            @endauth
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
         <div>
         @auth
            <h4 class="my-2 font-bold">
                Bookings
            </h4>
        </div>
          @forelse($events as $event) 
            <li><a href="{{ url('/byevent/'. $event->id ) }}" class="ml-4 hover:font-semibold">{{ $event->title }}</li></a>
          @empty
            <div class=" ml-4"> No Events Yet</div>
          @endforelse 
        @endauth
        </ul>
        <ul>
            <br>
            @guest
                <li class="hover:font-semibold ml-4"><a href="{{ url('login') }}">Sign In</a></li>
            @endguest
        </ul> 
            @auth 
            <div>
            <h4 class="my-2 font-bold">Admin</h4>
        </div>
            <ul>
                <li class="hover:font-semibold ml-4">
                    <a href="{{ url('/member/create') }}" class="hover:font-semibold no-underline">New Member.</a>
                </li>
                <li class="hover:font-semibold ml-4">
                    <a href="{{ url('/event/create') }}" class="hover:font-semibold no-underline">New Event.</a>
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