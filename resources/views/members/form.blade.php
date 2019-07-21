@csrf

@include ('errors')
<input type="hidden" value='{{ $membership }}' name=membership >

<div class="flex justify-between">

        <div class="w-1/2  field mb-6">
            <label class="block">
              <span class=" font-bold"><span class='text-red-500 '>* </span>First Name</span>
                <input  type="text" class="form-input mt-1 block w-full" 
                        name='firstname'
                        placeholder="Please enter your first name."
                        value="{{old('firstname', $member->firstname)}}">
            </label>
        </div>

        <div class="w-1/2 ml-4 field mb-6">
            <label class="block">
              <span class="-ml-1  font-bold"><span class='text-red-500 '>* </span>Surname</span>
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
          <span class=" font-bold"><span class='text-red-500 '>* </span>Email</span>
            <input  type="Email" class="form-input mt-1 block w-full"
                    name='email'
                    placeholder="Please enter your email address."
                    value="{{old('email', $member->email)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold"><span class='text-red-500 '>* </span>Mobile</span>
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
          <span class=" font-bold"><span class='text-red-500 '>* </span>Gender</span>
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
          <span class=" font-bold"><span class='text-red-500 '>* </span>Nationality</span>
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
          <span class=" font-bold">Occupation</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='occupation'
                    placeholder="Please enter your Occupation."
                    value="{{old('nationality', $member->occupation)}}">
        </label>
    </div>

    <div class="w-1/2 ml-4 field mb-6">
        <label class="block">
          <span class=" font-bold ">Company</span>
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

