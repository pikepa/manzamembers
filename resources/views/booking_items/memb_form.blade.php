@csrf



<div class=" p-2 mx-auto">
<div class="card">
        <div class=" block mb-4">
          <span class="font-bold text-gray-700">Member Tickets</span>
          <div class="mt-2">
            <div class="flex  flex-wrap ">
              <div class="inline-block relative w-64">
                <select name="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                  <option value=null >Please select a Ticket</option>
                  @foreach($tickettypes as $choice)
                  <option value='{{ $choice->id }}' 
                    @if (old('type') == '{{ $choice->id }}') {{ 'selected' }} @endif>{{ $choice->category['category'] }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="test w-1/2 block mb-4">
              <span class=" font-bold text-gray-800">Qty </span>
              <div class="mt-1">
                <div class=" flex flex-wrap ">
                  <div class="inline-block relative w-full">
                    <select name="qty" class="block text-center appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      @for ($i = 0; $i < 10; $i++)
                        <option value="{{ $i }}" @if (old('type') == "{{ $i }}"| $booking_item->qty == "{{ $i }}") {{ 'selected' }} @endif>{{ $i }}</option>
                      @endfor
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-manza is-link mr-2">{{ $buttonText }}</button>

                <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
            </div>
        </div>       
    </div>
</div>


