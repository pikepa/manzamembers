@csrf

@include ('errors')
<input type="hidden" value='{{ $membership->id }}' name=membership_id >

<div class="w-1/2  block mb-4">
      <span class=" font-bold text-gray-800">Title </span>
      <div class="mt-1">
        <div class=" flex flex-wrap ">
          <div class="inline-block relative w-full">
            <select name="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
              <option value="Mailing" @if (old('type') == "Mailing"| $address->type == "Mailing") {{ 'selected' }} @endif>Mailing</option>
              <option value="Home" @if (old('type') == "Home"| $address->type == "Home") {{ 'selected' }} @endif>Home</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>
</div>

    <div class="w-full field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Address 1</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='addr1'
                    placeholder="Enter the 1st address line."
                    value="{{old('addr1', $address->addr1)}}">
        </label>
    </div>
    

    <div class="w-full field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Address 2</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='addr2'
                    placeholder="Enter the 2st address line."
                    value="{{old('addr2', $address->addr2)}}">
        </label>
    </div>
    
<div class="flex justify-between">
    <div class="w-2/3 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Address 3</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='addr3'
                    placeholder="Enter the 3rd address line."
                    value="{{old('addr3', $address->addr3)}}">
        </label>
    </div>
    
    <div class="w-1/3 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">City</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='city'
                    placeholder="Enter the city"
                    value="{{old('city', $address->city)}}">
        </label>
    </div>
</div>

<div class="flex justify-between">

    <div class="w-1/2 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Country</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='country'
                    placeholder="Enter the country."
                    value="{{old('city', $address->country)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Postcode</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='postcode'
                    placeholder="Enter the postcode."
                    value="{{old('postcode', $address->postcode)}}">
        </label>
    </div>
</div>



<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ '/' }}" class="text-default">Cancel</a>
    </div>
</div>

