@csrf

@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Table No</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='table_no'
                placeholder="Enter the table No. for this booking."
                value="{{old('name', $booking->table_no)}}">
    </label>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="/bookings" class="text-default">Cancel</a>
    </div>
</div>

