@csrf

@include ('errors')

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Name in Full</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='name'
                placeholder="Please your name."
                value="{{old('name', $message->name)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Email</span>
        <input  type="Email" class="form-input mt-1 block w-full" 
                name='email'
                placeholder="Please enter your email address."
                value="{{old('email', $message->email)}}">
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Subject</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='subject'
                placeholder="Please enter a subject."
                value="{{old('subject', $message->subject)}}">
    </label>
</div>

<div class="field mb-6">
     <label class="block">
      <span class="text-gray-700">Query</span>
      <textarea class="form-textarea mt-1 block w-full" 
      name='content'
      rows="3" 
      placeholder="Please enter your comment or question.">{{old('content', $message->content) }}
      </textarea>
    </label>
</div>

<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Question for Humans</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='my_question'
                placeholder="Please enter the nationality of the artist stated in the title."
                value="{{old('my_question', $message->my_question)}}">
    </label>
</div>

{{-- 
<div class="field mb-6">
    <div class="block">
      <span class="text-gray-700">Status</span>
          <div class="mt-2 flex">
            <div>
              <label class="inline-flex items-center mr-4">
                <input type="radio" class="form-radio text-indigo-600" 
                name="status"  @if(old('status',$message->status)=="For Sale") checked @endif
                checked 
                value = 'For Sale'/>
                <span class="ml-2">For Sale</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mr-4">
                <input type="radio" class="form-radio text-pink-600" 
                name="status" @if(old('status',$message->status)=="Not For Sale") checked @endif
                value = 'Not For Sale'/>
                <span class="ml-2">Not for Sale</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mr-4">
                <input type="radio" class="form-radio text-red-600" 
                name="status" @if(old('status',$message->status)=="Sold") checked @endif
                value='Sold'/>
                <span class="ml-2">Sold</span>
              </label>
            </div>
        </div>
    </div>
</div>
 --}}
<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ $message->path() }}" class="text-default">Cancel</a>
    </div>
</div>

