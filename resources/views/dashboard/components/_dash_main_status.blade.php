@if($event->status === "Sold Out")
            <div class="text-center no_underline mt-4 text-lg text-indigo-900 font-extrabold">
                <p>Sold Out - Sorry!</p>
            </div>
@elseif($event->status !== "Sold Out")
        @if($event->bookings_only === "Bookings Only" and $event->ispublished())
            <div class="text-center mt-4 text-lg text-pink-600 font-extrabold ">
        <a href="{{ $url = action('EventController@show', ['id' => $event->id]) }}" >Register Now</a>                        </div>
        @endif

        @if($event->bookings_only === "Booking & Tickets" and $event->ispublished())
            <div class="text-center mt-4 text-lg text-pink-600 font-extrabold">
            <a href="{{ $url = action('EventController@show', ['id' => $event->id]) }}" >Get Your Tickets Now</a>
            </div>
        @endif

        @if( $event->isnotpublished())
            <div class="text-center no_underline mt-4 text-lg text-indigo-900 font-extrabold">
                <p>Bookings Opening Soon</p>
            </div>
        @endif
@endif
