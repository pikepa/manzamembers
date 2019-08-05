@csrf

<input type="hidden" value='{{ $event->id }}' name='event_id'>

@include ('errors')

<div class="w-2/3 mx-auto">
        <div class="field mb-6">
            <label class="block">
              <span class="font-semibold text-gray-700">Email</span>
                <input  type="email" class="form-input mt-1  w-full" 
                        name='email'
                        placeholder="Enter your email pls."
                        value="{{old('email', $booking->email)}}"> 
            </label>
        </div>
        <div class="flex flex-row">
            <div class="w-1/3 field mb-6">
                <label class="block">
                  <span class="font-semibold text-gray-700">Memb No.</span>
                    <input  type="text" class="form-input mt-1 block w-full" 
                            name='memb_no'
                            value="{{old('memb_no', $booking->memb_no)}}"> 
                </label>
            </div>

            <div class="w-1/3 ml-4 field mb-6">
                <label class="block">
                  <span class="font-semibold text-gray-700">No. of Adults.</span>
                    <input  type="text" class="form-input mt-1 block w-full" 
                            name='num_of_adults'
                            value="{{old('num_of_adults', $booking->num_of_adults)}}"> 
                </label>
            </div>

            <div class="w-1/3 ml-4 field mb-6">
                <label class="block">
                  <span class="font-semibold text-gray-700">No. of Tables.</span>
                    <input  type="text" class="form-input mt-1 block w-full" 
                            name='num_of_tables'
                            value="{{old('num_of_tables', $booking->num_of_tables)}}"> 
                </label>
            </div>
        </div>

        <div class="field mb-6">
            <label class="block w-2/3">
              <span class="font-semibold text-gray-700">{{ $event->add_info }}</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='add_info'
                        value="{{old('add_info', $booking->add_info)}}"> 
            </label>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-manza is-link mr-2">{{ $buttonText }}</button>

                <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
            </div>
        </div>
</div>



