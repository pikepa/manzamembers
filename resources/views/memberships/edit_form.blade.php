@csrf

@include ('errors')
<div class="flex mb-6 pb-4 border-solid border-b-4 border-gray-200">
        <div class="w-1/2 field ">
            <label class="block">
              <span class="form_label font-bold">Status</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='status'
                        value="{{old('surname', $membership->status)}}"
                        readonly>
            </label>
        </div>        
        <div class="w-1/2 ml-4 field">
            <label class="block">
              <span class="form_label font-bold">Membership No.</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='memb_no'
                        value="{{old('surname', $membership->memb_no)}}"
                        readonly>
            </label>
        </div>
</div>



<div class="flex justify-between">
        <div class="w-1/2 field mb-6">
            <label class="block mr-2">
              <span class="-ml-1 form_label font-bold"><span class='text-red-500 '>* </span>Membership Name</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='surname'
                        placeholder="Please enter your Family name."
                        value="{{old('surname', $membership->surname)}}">
            </label>
        </div>
</div>

<div class="flex justify-between">
        <div class="w-1/2 block mb-4">
          <span class="mb-4 text-gray-700 font-bold ">Membership Type</span>
            <div class="flex flex-wrap ">
              <div class="mt-2 w-full inline-block relative ">
                <select name="mship_type_id" class="w-full block appearance-none  bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                  @foreach($memb_types as $choice)
                  <option value='{{ $choice->id }}'@if(old('mship_type_id') == $choice->id | $membership->mship_type_id == $choice->id) {{ 'selected' }} @endif>{{ $choice->category }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
        </div>
       <div class="ml-4 w-1/2 block mb-4">
          <span class="mb-4 text-gray-700 font-bold ">Membership Term</span>
            <div class="flex flex-wrap ">
              <div class="mt-2 w-full inline-block relative ">
                <select name="mship_term_id" class="w-full block appearance-none  bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                  @foreach($memb_terms as $term)
                  <option value='{{ $term->id }}'@if(old('mship_term_id') == $term->id | $membership->mship_term_id == $term->id) {{ 'selected' }} @endif>{{ $term->category }}</option>
                  @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
        </div>

    
</div>


<div class="flex justify-between">
    <div class="w-1/2 field mb-6">
        <label class="block">
          <span class="form_label font-bold"><span class='text-red-500 '>* </span>Email</span>
            <input  type="Email" class="form-input mt-1 block w-full"
                    name='email'
                    placeholder="Please enter your email address."
                    value="{{old('email', $membership->email)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class="form_label font-bold"><span class='text-red-500 '>* </span>Mobile</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='phone'
                    placeholder="Please enter your mobile."
                    value="{{old('subject', $membership->phone)}}">
        </label>
    </div>
</div>


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ '/' }}" class="text-default">Cancel</a>
    </div>
</div>

