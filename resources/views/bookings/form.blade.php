@csrf

@include ('errors')

<input type="hidden" value='{{ $eventbooking->id }}' name=event_id >

<div class="mx-auto">
        <div class="field mb-6">
            <label class="block">
              <span class="font-semibold text-gray-700">Guest Names.</span>
                <input  type="text" class="form-input mt-1  w-full"
                        name='name'
                        placeholder="Please give us your guest names. (ie Tom Smith and Susan Jones)"

                        value="{{old('name', $eventbooking->booking['name'])}}">
            </label>
        </div>
        <div class="field mb-6">
            <label class="block">
              <span class="font-semibold text-gray-700">Email.</span>
                <input  type="email" class="form-input mt-1  w-full"
                        name='email'
                        placeholder="Enter your email please."
                        value="{{old('email', $eventbooking->booking['email'])}}">
            </label>
        </div>
        <div class="w-1/2  block mb-6">
            @if($eventbooking->id !== 20)
              <span class=" font-bold text-gray-800">Select Organisation.</span>
              <div class="mt-1">
                <div class=" flex flex-wrap ">
                  <div class="inline-block relative w-full">
                    <select name="add_info" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      <option value=''>Select your Organisation</option>
                      <option value='MANZA'>MANZA</option>
                      <option value='MNZCC'>MNZCC</option>
                      <option value='MABC'>MABC</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
              </div>
            @else
{{--
        <div class="flex flex-col md:flex-row justify-between">
            <div class="md:w-1/2 field mb-6">
                <label class="block">
                  <span class="font-semibold text-gray-700">Memb No.</span>
                    <input  type="text" class="form-input mt-1 block w-full"
                            name='memb_no'
                            placeholder="For Mbr Discount."
                            value="{{old('memb_no', $eventbooking->booking['memb_no'])}}">
                </label>
            </div>

--}}

            <div class="md:w-1/2 field mb-6">
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
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-manza is-link mr-2">{{ $buttonText }}</button>

                <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
            </div>
        </div>
</div>
