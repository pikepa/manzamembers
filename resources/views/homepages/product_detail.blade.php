@extends('layouts.app')

@section('addstyles')
    <script src="{{url('js/dropzone.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/dropzone.css')}}">
@endsection

@section('title', 'Piece Details')

@section('content')

     @include('layouts.partials.pageheader') 
    <div class="container mx-auto pb-4">
        <div class="mt-12 flex justify-around items-center flex-col">
            @if(isset($product->featured_img))
               <div class="max-w-md card mb-4 w-2/3 flex items-center justify-center">
                         <img class="object-cover object-centre p-4  " src="{{URL::asset( $product->featured_img)}}">  
                </div> 
            @endif  
            <div class="card w-2/3">
                <div class="mb-4">
                    <h1 class=" font-semibold text-2xl text-center text-base-700 pb-2"> {{ $product->title }}</h1>
                    <p class="pb-4"> {!! nl2br($product->description) !!}</p>
            
                    @include('dashboard.components._pricing')
                <div class="block mb-4">
                  <span class="text-gray-700">Categories</span>
                  <div class="mt-2">
                    <div class="flex flex-wrap ">
                      @foreach($product->categories as $existing)
                        <div class="mr-1 font-semibold">
                          <a href="/category/ {{ $existing->id }} " >
                            {{ $existing->category }},</a>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                </div>
                <div class="flex ">         
                    <div class="flex-1 text-sm">
                        <p><a class="no-underline"  href="{{ $url = '/' }}" ><i class="fas fa-backward"></i> Back</a></p>
                    </div>
                    @auth
                        <div class="text-sm mr-4">
                            <p><a class="no-underline"  href="{{ $url = action('ProductController@edit', $product->id) }}" ><i class="far fa-edit"></i> Edit</a></p>
                        </div>
                        <div class="text-sm">
                            <form method="POST" action="{{ $product->path() }}" class="text-right">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-sm"><i class="far fa-trash-alt"></i> Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
                 

            <main class="flex flex-wrap -mx-2 py-4">
               @forelse($images as $image) 
                    <div class="w-1/3 px-2 py-2">
                        <div class="card flex-1  overflow-hidden" >
                            <img class="w-full object-cover object-centre rounded" src="{{$image->getUrl('thumb')}}" alt="Picture is Missing here">
                            <div class='flex justify-between' >
                                @auth
                                <a href="/images/{{$product->id}}/{{$image->id}}/delete"><i class="fas fa-trash"></i></a>
                                <a href="/images/{{$product->id}}/{{$image->id}}/featured"><i class="fas fa-bolt"></i></a>
                                @endauth
                                <a href="/images/{{$image->id}}"><i class="fas fa-external-link-alt"></i></a>
                            </div>  
                        </div>
                    </div>
                @empty
                   <div class="card mx-2"> No Pictures Yet</div>
                @endforelse
            </main>
        </div>
                @auth
                <div class="my-4 w-2/3" id="dropzone">
                     <form method="post" action="/images/upload" enctype="multipart/form-data" class="dropzone card" id="addPhotosForm" >
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value={{$product->id}}>

                    </form>
                </div>
                @endauth
        </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        Dropzone.options.addPhotosForm = {
            paramName : 'image',
            maxFilesize : 4,
            timeout : 0,
            acceptedFiles : '.jpg, .JPG, .JPEG, .jpeg, .png, .bmp',
            init: function() {
                this.on('success', function(){
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                            location.reload();
                    }
                });
            }
        };
    </script>

            
@endsection
