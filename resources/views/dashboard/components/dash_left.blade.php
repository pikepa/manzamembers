<div class="md:w-1/5 font-sans card px-2 ml-4 mt-2 md:ml-0 ">
    
    <div class=" ml-2 mb-2 ">
        <ul class="">
            <li><a href="{{ url('/') }}" class="my-2 font-semibold hover:font-bold no-underline">Home</a></li>
            <li class="ml-2"><a href="{{ url('/aboutus') }}" class="hover:font-semibold no-underline">About Us</a></li>
            <li class="ml-2"><a href="{{ url('/message/create') }}" class="hover:font-semibold no-underline">Contact Us</a></li>   
      {{--  <li class="ml-2"><a href="{{ url('/coming_soon') }}" class="hover:font-semibold no-underline">Join MANZA</a></li>   --}}
        </ul>
    </div>
   <div class="ml-2 mb-2">
        @auth
        <div>
            <h4 class="my-2 font-bold">
                Membership
            </h4>
        </div>
        <ul>
                @can('membership-add')
                    <li class="ml-2"><a href="{{ url('/member/create') }}" class="hover:font-semibold no-underline">Add New Member.</a></li>
                @endcan
                <li class="ml-2"><a href="{{ url('/membership') }}" class="hover:font-semibold no-underline">All Mships</a></li>
                <li class="ml-2"><a href="{{ url('/membership/current') }}" class="hover:font-semibold no-underline">Current M'ships</a></li>
                <li class="ml-2"><a href="{{ url('/membership/expired') }}" class="hover:font-semibold no-underline">Expired M'ships</a></li>
                <li class="ml-2"><a href="{{ url('/membership/pending') }}" class="hover:font-semibold no-underline">Pending M'ships</a></li>
                <li class="ml-2"><a href="{{ url('/memberstatusupdate') }}" class="hover:font-semibold no-underline">Update Status</a></li>
                <li class="ml-2"><a href="{{ url('/memberlisting') }}" class="hover:font-semibold no-underline">List Members</a></li>        
                <li class="ml-2"><a href="{{ url('/address') }}" class="hover:font-semibold no-underline">Address List</a></li>        
                <li class="ml-2"><a href="{{ url('/membership/noaddress') }}" class="hover:font-semibold no-underline">No Address</a></li>        
        
        </ul>
            @can('receipt-read') 
                <div>
                    <h4 class="my-2 font-bold">
                        Receipts
                    </h4>
                </div>
                <ul>
                    <li class="ml-2"><a href="{{ url('/receiptlisting') }}" class="hover:font-semibold no-underline">List Receipts</a></li>
                </ul>
            @endcan
       @endauth   
    <div class="mb-2">
        @auth 
        <div><h4 class="my-2 font-bold">Events</h4></div>
        <ul class="">
            @can('event-add')
                <li class="ml-2"><a href="{{ url('/event/create') }}" class="hover:font-semibold no-underline">New Event.</a></li>    
            @endcan
            <li class="ml-2"><a href="{{ url('/event') }}" class="hover:font-semibold no-underline">Event Listing</a></li>
            <div>
                <h4 class="my-2 font-bold">Ticket Bookings</h4>
            </div>

            @forelse($eventswithbookings as $event) 
                <li><a href="{{ url('/byevent/'. $event->id ) }}" class="ml-2 hover:font-semibold">{{ $event->title }}</li></a>
            @empty
                <div class=" ml-2"> No Events Yet</div>
            @endforelse 

            <div>
                <h4 class="my-2 font-bold">Reservations</h4>
            </div>
            @forelse($eventswithreservations as $reservation) 
                <li><a href="{{ url('/reservation/'. $reservation->id ) }}" class="ml-2 hover:font-semibold">{{ $reservation->title }}</a></li>
            @empty
                <div class=" ml-2"> No Reservations Yet</div>
            @endforelse 
        @endauth
        </ul>
        <ul>
            @guest
                <li class="w-1/2 button btn-manza hover:font-semibold "><a href="{{ url('login') }}">Sign In</a></li>
            @endguest
        </ul> 
            @auth 
            <div>
            <h4 class="my-2 font-bold">Admin</h4>
        </div>
            <ul>
                @can('message-read')
                    <li class="ml-2"><a href="{{ url('/message') }}" class="hover:font-semibold no-underline">Show Messages.</a></li>
                @endcan
                @can('category-read')
                    <li class="ml-2"><a href="{{ url('/category') }}" class="hover:font-semibold no-underline">Categories.</a></li>
                @endcan
            </ul>
                @hasrole('SuperAdmin') {{-- Laravel-permission blade helper --}}
                    <a href="/users"><i class="fa fa-btn fa-unlock"></i>  User Admin</a>
                @endrole 
                <br>
  
                <a href="{{ route('logout') }}"
                    class="hover:font-semibold no-underline ml-2"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form> 
                <br>
                @endauth

    </div>
</div>
</div>

