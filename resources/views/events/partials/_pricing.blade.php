<div class="flex items-center">
        <div class="bg-gray-400 w-1/2 py-2 px-6 border-b border-r border-grey-light font-semibold">
          Ticket Type
        </div>
        <div class="bg-gray-400 flex-1 text-center py-2 px-6 border-b border-r border-grey-light font-semibold">Price</div>
    @can('priceitem-add')
     <div class="bg-gray-400 p-2  border-b border-r border-grey-light"><a href="\priceitem\create\{{ $event->id }}" ><i class="fas fa-plus"></i></a></div>           
    @endcan
</div>
@foreach($priceitems as $item)
    <div class="flex items-center">
        @if($item->memb == 0)
            <div class="w-1/2 p-2  border border-grey-light ">NM - {{ $item->category->category}}</div>
        @else
            <div class="w-1/2 p-2  border border-grey-light ">{{ $item->category->category}}</div>
        @endif
        <div class="flex-1 text-right p-2  border border-grey-light ">{{ $item->formatted_price }}</div>
        <div class="border border-grey-light" >
          @can('priceitem-delete')
            @include('layouts.partials.icons._delete',['variable'=>$item->path()])
          @endcan                        
        </div>
    </div>
@endforeach