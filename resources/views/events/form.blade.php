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


    <div class="field w-full mb-6">
         <label class="block">
          <span class=" font-bold text-gray-800">Event Description :</span>
          <textarea class="form-textarea mt-1 block w-full" 
          name='description'
          rows="3" 
          placeholder="Please enter the event description.">{{old('description',$event->description)}}
          </textarea>
        </label>
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
          rows="2" 
          placeholder="Please enter the venue address.">{{old('v_address', $event->v_address) }}
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

