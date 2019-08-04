@csrf

<input type="hidden" value='{{ $membership_id }}' name='membership_id'>

@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Receipt Date</span>
        <input  type="date" class="form-input mt-1 block w-full" 
                name='date'
                placeholder="Enter the date of the receipt."
                value="{{old('date', $receipt->date->format('Y-m-d'))}}"> 
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Payee</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='payee'
                placeholder="Enter the Payee name."
                value="{{old('payee', $receipt->payee)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Receipt No.</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='receipt_no'
                placeholder="Enter the receipt number."
                value="{{old('receipt_no', $receipt->receipt_no)}}">
    </label>
</div>

       <div class="block mb-6">
          <span class="mb-4 text-gray-700 font-bold ">Membership Term</span>
            <div class="flex flex-wrap ">
              <div class="mt-2 w-full inline-block relative ">
                <select name="mship_term_id" class="w-full block appearance-none  bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                  @foreach($memb_terms as $term)
                  <option value='{{ $term->id }}'@if(old('mship_term_id') == $term->id | $receipt->mship_term_id == $term->id) {{ 'selected' }} @endif>{{ $term->category }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
        </div>


<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Receipt Amount (RM)</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='amount'
                placeholder="Enter the amount in RM."
                value="{{old('amount', $receipt->formatted_amount)}}">
    </label>
</div>


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
    </div>
</div>

