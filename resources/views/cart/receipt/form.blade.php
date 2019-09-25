@csrf


@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Receipt Date</span>
        <input  type="date" class="form-input mt-1 block w-full" 
                name='receipt_date'
                placeholder="Enter the date of the receipt."
                value="{{old('date', $receipt->receipt_date->format('Y-m-d'))}}"> 
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="mb-4 text-gray-700 font-bold">Description</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='description'
                placeholder="Enter the service paid for."
                value="{{old('description', $receipt->description)}}">
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

