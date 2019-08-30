@csrf

@include ('errors')


    <div class="w-full field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Event Title :</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='title'
                    placeholder="Enter the event title."
                    value="{{old('title', $event->title)}}">
        </label>
    </div>


    <div class="field w-full mb-4">
         <label class="block">
          <span class=" font-bold text-gray-800">Event Description :</span>
          <textarea class="form-textarea mt-1 block w-full" 
          name='description'
          rows="3" 
          placeholder="Please enter the event description.">{{old('description',strip_tags($event->description))}}
          </textarea>
        </label>
    </div>

    <div class="flex justify-between md:items-center flex-col md:flex-row">
        <div class="w-1/2  block mb-4">
              <span class=" font-bold text-gray-800">Additional Info</span>
              <div class="mt-1">
                <div class=" flex flex-wrap ">
                  <div class="inline-block relative w-full">
                    <select name="add_info" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      <option value=''>Select if required</option>
                      @foreach($items as $item)
                      <option value="{{ $item }}" @if (old('item') ==  $item |  $event->add_info  ==  $item ) {{ 'selected' }} @endif>{{ $item }}</option>
                    @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        
        <div class="field mt-4 mb-4">
          <div class="block">
                <div class="mt-4 flex">
                  <div>
                    <label class="inline-flex items-center mr-4">
                      <input type="checkbox" class="form-radio text-pink-600" 
                      name="memb_na"  @if(old('status',$event->memb_na)=="memb_na") checked @endif
                      value = 'memb_na'/>
                      <span class="ml-2">Membership Not Required</span>
                    </label>
                  </div>
              </div>
          </div>
    </div>
    </div>

    <div class="flex justify-left md:items-center flex-col md:flex-row">
        <div class=" field mb-4">
            <label class="block">
              <span class=" font-bold text-gray-800">Max Bookings :</span>
                <input  type="text" class="form-input mt-1 block w-1/2" 
                        name='max_bookings'
                        placeholder="Max Qty."
                        value="{{old('max_bookings', $event->max_bookings)}}">
            </label>
        </div>

      <div class="field mt-4 mb-4">
        <div class="block">
              <div class="mt-2 flex">
                <div>
                  <label class="inline-flex items-center mr-4">
                    <input type="radio" class="form-radio text-pink-600" 
                    name="bookings_only"  @if(old('status',$event->bookings_only)=="Bookings Only") checked @endif
                    checked 
                    value = 'Bookings Only'/>
                    <span class="ml-2">Bookings Only</span>
                  </label>
                </div>
                <div>
                  <label class="inline-flex items-center mr-4">
                    <input type="radio" class="form-radio text-pink-600" 
                    name="bookings_only"  @if(old('status',$event->bookings_only)=="Booking & Tickets") checked @endif
                    value = 'Booking & Tickets'/>
                    <span class="ml-2">Booking & Tickets</span>
                  </label>
                </div>
            </div>
        </div>
    </div>
</div>   

    <div class="w-full  field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Venue :</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='venue'
                    placeholder="Enter the event venue."
                    value="{{old('venue', $event->venue)}}">
        </label>
    </div>

    <div class="field w-full mb-6">
         <label class="block">
          <span class=" font-bold text-gray-800">Venue Address :</span>
          <textarea class="form-textarea mt-1 block w-full" 
          name='v_address'
          rows="1" 
          placeholder="Please enter the venue address.">{{old('v_address', strip_tags($event->v_address)) }}
          </textarea>
        </label>
    </div>
<div class="flex">
    <div class="field w-1/2  mb-6">
        <label class="block">
          <span class="font-bold text-gray-800">Event Date :</span>
            <input  type="date" class="form-input mt-1 block w-full" 
                    name='date'
                    placeholder="Enter the date of the category."
                    value="{{old('date', $event->date->format('Y-m-d'))}}"
                    > 
        </label>
    </div>

        <div class="field w-1/2 ml-4 mb-6">
            <label class="block">
              <span class=" font-bold text-gray-800">From :</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='timing'
                        placeholder="Enter the event timing."
                        value="{{old('timing',$event->timing)}}">
            </label>
        </div>

</div>


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
    </div>
</div>

