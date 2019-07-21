@csrf

@include ('errors')

<div class="flex mx-auto card w-5/6 text-lg">
    <div class="w-1/2 mx-auto  flex  flex-col ">
        <div class="flex flex-row ">
            <div class="w-1/3 ml-4 form_label font-bold ">Status : </div>
                <div class="ml-2 font-bold text-orange-500">{{ $membership->status }}</div>
        </div>   
        <div class="flex flex-row">
            <div class="w-1/3 ml-4 form_label font-bold">M'ship Type : </div>
            <div class="ml-2">{{ $membership->mship->category }}</div>
        </div>       
        <div class="flex flex-row">
            <div class="w-1/3 ml-4 form_label font-bold">M'ship Term : </div>
            <div class="ml-2">{{ $membership->term->category}}</div> 
        </div>       
    </div>    

    <div class="w-1/2 mx-auto  flex  flex-col ">
        <div class="flex flex-row">
            <div class="w-1/2 ml-4 form_label font-bold">Date 1st Joined</div>
            <div class="ml-2">: {{ $membership->date_joined }}</div> 
        </div>   
        <div class="flex flex-row">
            <div class="w-1/6 ml-4 form_label font-bold">Email  </div>
            <div class="ml-2">: {{ $membership->email }}</div> 
        </div>       
        <div class="flex flex-row">
            <div class=" w-1/6 ml-4 form_label font-bold">Mobile</div>
            <div class="ml-2 flex-1">: {{ $membership->phone }}</div> 
            <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $membership->path() }}/edit" ><i class="far fa-edit"></i></a></div>

        </div>       
    </div>

</div>
@include('memberships.memb_index')

