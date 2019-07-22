@csrf

@include ('errors')
<input name='event_id' type="hidden" value='{{ $event_id }}' >

<div class="block mb-4">
  <span class="text-gray-700">Type</span>
  <div class="mt-2">
    <div class="flex flex-wrap ">
      <div class="inline-block relative w-64">
        <select name="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
          <option value=''>Select a Type</option>
          @foreach($tickettypes as $choice)
          <option value='{{ $choice->id }}' @if (old('type') == '{{ $choice->id }}') {{ 'selected' }} @endif>{{ $choice->category }}</option>
          @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="field mb-6">
    <label class="block w-1/2">
      <span class=" text-gray-700">Price</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='price'
                placeholder="Enter the price in Cents."
                value="{{old('price' )}}">
    </label>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="/category" class="text-default">Cancel</a>
    </div>
</div>

