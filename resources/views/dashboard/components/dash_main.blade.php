<main class=" flex flex-1 flex-row flex-wrap pt-2 pl-1">

        @foreach ($events as $event)
            <div class="flex flex-col  content-between card w-64 mb-2 ml-1">
                <div class="h-10px mx-auto text-center">
                    @if(isset($event->featured_img))
                        <img class=" rounded-lg object-cover object-centre w-full" src={{ $event->featured_img }} alt="<{{ $event->title }}>">
                    @endif
                </div>
                <div class="flex-1"></div> {{-- This is a filler  --}}
                <div class=" card text-center">
                    <h1 class="text-xl text-indigo-900 font-semibold p-2">{{ $event->title }}</h1>
                </div>
                <div class="flex flex-col justify-between ">
                    <div class="flex-1 h-auto ">
                        <p class=" mt-4">{!! nl2br(substr($event->description,0,100))!!}
                        <a class="text-blue-900 font-extrabold no-underline" href="{{ $url = action('EventController@show', ['id' => $event->id]) }}" > ... see more <i class="fas fa-angle-double-right"></i></a></p>
                    </div>

                    <div class="">
                       {{--  @include('dashboard.components._pricing')  --}}          
                    </div>
                    @if($event->bookings_only === "Bookings Only" and $event->ispublished())
                        <div class="text-center mt-4 text-lg text-indigo-900 font-semibold">
                            <p>Bookings Open</p>
                        </div>
                    @endif
                    @if($event->bookings_only === "Booking & Tickets" and $event->ispublished())
                        <div class="text-center mt-4 text-lg text-indigo-900 font-semibold">
                            <p>Get Your Tickets Now</p>
                        </div>
                    @endif
                    @if( !$event->ispublished())
                        <div class="text-center mt-4 text-lg text-indigo-900 font-semibold">
                            <p>Tickets Coming Soon</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="mt-12 mx-auto"><a  href="https://en.calameo.com/read/00506399529496a1e7d5c" target="_blank" rel="noopener"><img src="https://www.manza.org/wp-content/uploads/2019/02/MANZA-June-cover-616x436.jpg"></a></div>
        <div class="text-red-800 font-semibold mx-auto text-3xl"><h1 class="mx-auto">Click the Magazine cover to open.</h1></div>


</main>
