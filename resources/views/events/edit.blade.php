@extends('layouts.app')

@section('addstyles')
    <script src="{{url('js/dropzone.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/dropzone.css')}}">
@endsection

@section('title', 'Edit Event')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-2/3 mx-auto card p-6  px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit Event Details
        </h1>

        <form 
                method="POST"
                action="{{ $event->path() }}"
        >
            @method('PATCH')

            @include ('events.form', [
                'buttonText' => 'Update'
            ])
            <main class="flex flex-wrap -mx-2 py-4">
               @forelse($images as $image) 
                    <div class="w-1/3 px-2 py-2">
                        <div class="card flex-1  overflow-hidden" >
                            <img class="w-full object-cover object-centre rounded" src="{{$image->getUrl('thumb')}}" alt="Picture is Missing here">
                            <div class='flex justify-between' >
                                @auth
                                <a href="/images/{{$event->id}}/{{$image->id}}/delete"><i class="fas fa-trash"></i></a>
                                <a href="/images/{{$event->id}}/{{$image->id}}/featured"><i class="fas fa-bolt"></i></a>
                                @endauth
                                <a href="/images/{{$image->id}}"><i class="fas fa-external-link-alt"></i></a>
                            </div>  
                        </div>
                    </div>
                @empty
                   <div class="card mx-2"> No Pictures Yet</div>
                @endforelse
            </main>

        </form>
                @auth
                <div class="my-4 " id="dropzone">
                     <form method="post" action="/images/upload" enctype="multipart/form-data" class="dropzone card" id="addPhotosForm" >
                        {{csrf_field()}}
                        <input type="hidden" name="event_id" value={{$event->id}}>
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
