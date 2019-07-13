<main class=" flex flex-col flex-1   -mx-2 px-2 py-4">
<div class="mx-auto"><a  href="https://en.calameo.com/read/00506399529496a1e7d5c" target="_blank" rel="noopener"><img src="http://www.manza.org/wp-content/uploads/2019/02/MANZA-June-cover-616x436.jpg"></a></div>
<div class="text-red-800 font-semibold mx-auto text-3xl"><h1 class="mx-auto">Click the Magazine cover to open.</h1></div>

{{--@foreach ($products as $product)
    <div class="flex flex-col card  mb-2 " style=" width:325px">
            @if(isset($product->featured_img))
                <div class="mx-auto text-center">
                     <img class="w-auto rounded-lg object-cover object-centre w-full" src={{ $product->featured_img }} style="height:325px" alt="<{{ $product->title }}>">
                </div>
            @endif
        <div class=" card mt-2 text-center">
            <h1 class="text-xl font-semibold p-2">{{ $product->title }}</h1>
        </div>
        <div class="flex flex-col justify-between ">
            <div class="flex-1 h-auto ">
                <p class=" mt-4">{{ substr($product->description ,0,100) }}  
                <a class="text-blue-900 font-extrabold no-underline" href="{{ $url = action('ProductController@show', ['id' => $product->id]) }}" >... more <i class="fas fa-angle-double-right"></i></a></p>
            </div>

            <div class="">
                @include('dashboard.components._pricing')           
            </div>

            <div>
                <p>Published {{ $product->published_date }}</p>
            </div>
        </div>
    </div>
@endforeach--}}



</main>