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

<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ '/' }}" class="text-default">Cancel</a>
    </div>
</div>

