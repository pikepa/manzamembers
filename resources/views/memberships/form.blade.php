@csrf

@include ('errors')

<div class="flex mx-auto card w-3/4 text-lg">
    <div class="w-1/2 mx-auto  flex  flex-col ">
        <div class="flex flex-row">
            <div class="w-1/3 ml-4 font-bold text-gray-700">Status</div>
            <div class="ml-2">: {{ $membership->status }}</div> 
        </div>   
        <div class="flex flex-row">
            <div class="w-1/3 ml-4 font-bold text-gray-700">M'ship Type</div>
            <div class="ml-2">: {{ $membership->mship->category }}</div> 
        </div>       
        <div class="flex flex-row">
            <div class="w-1/3 ml-4 font-bold text-gray-700">M'ship Term</div>
            <div class="ml-2">: {{ $membership->term->category}}</div> 
        </div>       
    </div>    

    <div class="w-1/2 mx-auto  flex  flex-col ">
        <div class="flex flex-row">
            <div class="w-1/2 ml-4 font-bold text-gray-700">Date 1st Joined</div>
            <div class="ml-2">: {{ $membership->date_joined }}</div> 
        </div>   
        <div class="flex flex-row">
            <div class="w-1/2 ml-4 font-bold text-gray-700">-</div>
            <div class="ml-2">: {{ $membership->mship->category }}</div> 
        </div>       
        <div class="flex flex-row">
            <div class="w-1/2 ml-4 font-bold text-gray-700">-</div>
            <div class="ml-2">: {{ $membership->term->category}}</div> 
        </div>       
    </div>

</div>
@include('memberships.memb_index')

