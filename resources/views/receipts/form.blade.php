@csrf

<input type="hidden" value='{{ $membership_id }}' name='membership_id'>

@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Receipt Date</span>
        <input  type="date" class="form-input mt-1 block w-full" 
                name='date'
                placeholder="Enter the date of the category."
                value="{{old('date', $receipt->date_joined->format('Y-m-d') )}}"> 
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Payee</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='payee'
                placeholder="Enter the Payee name."
                value="{{old('payee', $receipt->surname)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Receipt No.</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='receipt_no'
                placeholder="Enter the receipt number."
                value="{{old('receipt_no', $receipt->receipt_no)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Receipt Amount</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='amount'
                placeholder="Enter the amount in RM."
                value="{{old('amount', $receipt->receipt_amount)}}">
    </label>
</div>


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="/category" class="text-default">Cancel</a>
    </div>
</div>

