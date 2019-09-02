@csrf

<input type="hidden" value='{{ $event->id }}' name='event_id'>

@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold"><span class='text-red-500 '>* </span>Name</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='name'
                placeholder="Enter your name."
                value="{{old('name', $reservation->name)}}"> 
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold"><span class='text-red-500 '>* </span>Email</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='email'
                placeholder="Enter your email."
                value="{{old('email', $reservation->email)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Mobile</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='mobile'
                placeholder="Enter your mobile No."
                value="{{old('mobile', $reservation->mobile)}}">
    </label>
</div>
<div class="flex flex-row justify-between">
    <div class="w-1/4 field mb-6">
        <label class="block">
          <span class="mb-4 text-gray-700 font-bold"><span class='text-red-500 '>* </span>No. of People</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='res_qty'
                    placeholder="No. Pax."
                    value="{{old('res_qty', $reservation->res_qty)}}">
        </label>
    </div>

    <div class="w-1/2 field mb-6 ml-4 ">
        <label class="block">
          <span class="mb-4 text-gray-700 font-bold"><span class='text-red-500 '>* </span>Human Verification Total</span>
            <input  type="text" class=" form-input mt-1 block w-full" 
                    name='verification'
                    placeholder="Add 5 + 3 "
                    value="{{old('res_qty', $reservation->verification)}}">
        </label>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
    </div>
</div>

