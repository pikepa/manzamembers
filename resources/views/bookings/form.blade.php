@csrf

@include ('errors')

<input type="hidden" value='{{ $eventbooking->id }}' name=event_id >

<div class="w-2/3 mx-auto">
        <div class="field mb-6">
            <label class="block">
              <span class="font-semibold text-gray-700">Name</span>
                <input  type="text" class="form-input mt-1  w-full" 
                        name='name'
                        placeholder="Enter your name please."
                        value="{{old('name', $eventbooking->booking['name'])}}"> 
            </label>
        </div>
        <div class="field mb-6">
            <label class="block">
              <span class="font-semibold text-gray-700">Email</span>
                <input  type="email" class="form-input mt-1  w-full" 
                        name='email'
                        placeholder="Enter your email please."
                        value="{{old('email', $eventbooking->booking['email'])}}"> 
            </label>
        </div>
        <div class="flex flex-row justify-between">
            <div class="w-1/3 field mb-6">
                <label class="block">
                  <span class="font-semibold text-gray-700">Memb No.</span>
                    <input  type="text" class="form-input mt-1 block w-full" 
                            name='memb_no'
                            placeholder="For Mbr Discount."
                            value="{{old('memb_no', $eventbooking->booking['memb_no'])}}"> 
                </label>
            </div>
            <div class="w-1/2 field mb-6">
                <label class="block ">
                @if($eventbooking->add_info !== null)
                  <span class="font-semibold text-gray-700">{{ $eventbooking->add_info }}</span>
                @else
                  <span class="font-semibold text-gray-700">Additional Info</span>
                @endif
                    <input  type="text" class="form-input mt-1 block w-full" 
                            name='add_info'
                            value="{{old('add_info', $eventbooking->booking['add_info'])}}"> 
                </label>
            </div>
            {{--  top of ticket section 

            --}}
        </div>
        

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-manza is-link mr-2">{{ $buttonText }}</button>

                <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
            </div>
        </div>
</div>



