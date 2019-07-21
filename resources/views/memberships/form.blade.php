@csrf

@include ('errors')
<div class="card w-5/6 mx-auto">
    <div class="flex   text-lg">
        <div class="w-1/2 mx-auto  flex  flex-col ">
            <div class="flex flex-row ">
                <div class="w-1/3 ml-4 font-bold ">Status : </div>
                    <div class="ml-2 pending font-bold ">{{ $membership->status }}</div>
            </div>   
            <div class="flex flex-row">
                <div class="w-1/3 ml-4  font-bold">M'ship Type : </div>
                <div class="ml-2">{{ $membership->mship->category }}</div>
            </div>       
            <div class="flex flex-row">
                <div class="w-1/3 ml-4  font-bold">M'ship Term : </div>
                <div class="ml-2">{{ $membership->term->category}}</div> 
            </div>       
        </div>    

        <div class="w-1/2 mx-auto  flex  flex-col ">
            <div class="flex flex-row">
                <div class="w-1/2 ml-4  font-bold">Date 1st Joined</div>
                <div class="ml-2">: {{ $membership->formatted_date_joined }}</div> 
            </div>   
            <div class="flex flex-row">
                <div class="w-1/6 ml-4  font-bold">Email  </div>
                <div class="ml-2">: {{ $membership->email }}</div> 
            </div>       
            <div class="flex flex-row">
                <div class=" w-1/6 ml-4  font-bold">Mobile</div>
                <div class="ml-2 flex-1">: {{ $membership->phone }}</div> 
            </div>       
        </div>
    </div>
    <div class="flex mt-4 justify-between mx-auto text-lg">
        <p><a class="no-underline hover:font-semibold"  href="{{ $url = '/membership' }}" ><i class="fas fa-backward"></i> Back</a></p>
        <p><a class="no-underline hover:font-semibold"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i> Receipt</a></p>
        <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $membership->path() }}/edit" ><i class="far fa-edit"></i></a></div>
    </div>
</div>
@include('memberships.memb_index')
@include('receipts.receipt_index')

