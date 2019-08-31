<main class=" flex flex-1 flex-row flex-wrap pt-2 pl-1">
        @foreach ($events as $event)
            <div class="flex flex-col md:w-1/4 content-between card mb-2 ml-1">
                <div class="h-10px mx-auto text-center">
                    @if(isset($event->featured_img))
                        <img style='height:300px' class=" rounded-lg object-cover object-centre w-full" src={{ $event->featured_img }} alt="<{{ $event->title }}>">
                    @endif
                </div>
                <div class=""></div> {{-- This is a filler  --}}
                <div class="h-20  mt-1 pb-4 card border  border-gray-500 text-center">
                    <h1 class="text-xl text-indigo-900 font-semibold pt-2 ">{{ $event->title }}</h1>
                </div>
                <div class="flex flex-col justify-between ">
                    <div class="flex-1 h-auto ">
                        <p class="mt-4">{!! nl2br(substr($event->description,0,90))!!}
                        <a class="text-blue-900 font-extrabold no-underline" href="{{ $url = action('EventController@show', ['id' => $event->id]) }}" > ... see more <i class="fas fa-angle-double-right"></i></a></p>
                    </div>

                    <div class="">
                       {{--  @include('dashboard.components._pricing')  --}}          
                    </div>
                    @if($event->bookings_only === "Bookings Only" and $event->ispublished())
                        <div class="text-center mt-4 text-lg text-pink-600 font-extrabold ">
                   <a href="{{ $url = action('EventController@show', ['id' => $event->id]) }}" >Bookings Open</a>                        </div>
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
                </div>
            </div>
        @endforeach


</main>
