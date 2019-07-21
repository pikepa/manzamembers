@csrf

@include ('errors')
<input type="hidden" value='{{ $membership }}' name=membership >

<div class="flex justify-between">
    <div class="w-1/2 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Date Joined</span>
            <input  type="date_joined" class="form-input mt-1 block w-full" 
                    name='date_joined'
                    placeholder="Enter the date joined."
                    value="{{old('date_joined', $member->date_joined)}}">
        </label>
    </div>
    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Orig Memb No.</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='old_membership_no'
                    placeholder="Enter the old Member No."
                    value="{{old('old_membership_no', $member->old_membership_no)}}">
        </label>
    </div>
</div>

<div class="w-1/2  block mb-4">
      <span class=" font-bold text-gray-800">Title </span>
      <div class="mt-1">
        <div class=" flex flex-wrap ">
          <div class="inline-block relative w-full">
            <select name="title" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
              <option value=''>Select a title (Optional)</option>
              @foreach($titles as $title)
              <option value="{{ $title }}" @if (old('title') ==  $title |  $member->title  ==  $title ) {{ 'selected' }} @endif>{{ $title }}</option>
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
        <div class="w-1/2  field mb-6">
            <label class="block">
              <span class=" font-bold text-gray-800"><span class='text-red-500 '>* </span>First Name</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='firstname'
                        placeholder="Please enter your first name."
                        value="{{old('firstname', $member->firstname)}}">
            </label>
        </div>

        <div class="w-1/2 ml-4 field mb-6">
            <label class="block">
              <span class="-ml-1  font-bold text-gray-800"><span class='text-red-500 '>* </span>Surname</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='surname'
                        placeholder="Please enter your Family name."
                        value="{{old('surname', $member->surname)}}">
            </label>
        </div>

</div>

<div class="flex justify-between">
    <div class="w-1/2 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800"><span class='text-red-500 '>* </span>Email</span>
            <input  type="Email" class="form-input mt-1 block w-full"
                    name='email'
                    placeholder="Please enter your email address."
                    value="{{old('email', $member->email)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800"><span class='text-red-500 '>* </span>Mobile</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='mobile'
                    placeholder="Please enter your mobile."
                    value="{{old('mobile', $member->mobile)}}">
        </label>
    </div>
</div>

<div class="flex justify-between">
    <div class="w-1/2 field mb-6">
        <div class="block">
          <span class="font-bold text-gray-800"><span class='text-red-500 '>* </span>Gender</span>
              <div class="mt-2 flex">
                <div>
                  <label class="inline-flex items-center mr-4">
                    <input type="radio" class="form-radio text-indigo-600" 
                    name="gender"  @if(old('gender',$member->gender)=="Male") checked @endif 
                    value = 'Male'/>
                    <span class="ml-2">Male</span>
                  </label>
                </div>
                <div>
                  <label class="inline-flex items-center mr-4">
                    <input type="radio" class="form-radio text-pink-600" 
                    name="gender" @if(old('gender',$member->gender)=="Female") checked @endif
                    value = 'Female'/>
                    <span class="ml-2">Female</span>
                  </label>
                </div>
            </div>
        </div>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800"><span class='text-red-500 '>* </span>Nationality</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='nationality'
                    placeholder="Please enter your nationality."
                    value="{{old('nationality', $member->nationality)}}">
        </label>
    </div>
</div>

<div class="flex justify-between">
    <div class="w-1/2 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Occupation</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='occupation'
                    placeholder="Please enter your Occupation."
                    value="{{old('nationality', $member->occupation)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Company</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='company'
                    placeholder="Please enter your company."
                    value="{{old('company', $member->company)}}">
        </label>
    </div>
</div>


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ '/' }}" class="text-default">Cancel</a>
    </div>
</div>

