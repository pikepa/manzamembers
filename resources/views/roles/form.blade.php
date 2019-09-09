@csrf

@include ('errors')

<div class=" field mb-6">
        <label class="block">
          <span class=" font-bold text-gray-800">Name</span>
            <input  type="text" class="form-input mt-1 block w-full" 
                    name='name'
                    placeholder="Enter role name."
                    value="{{old('name',$role->name)}}">
        </label>
</div>

       <div class="field mt-4 mb-4">
          <div class="block">
                <div class="mt-4 flex flex-wrap flex-row">
                  @foreach ($permissions as $permission)
                    <div class="w-1/4">
                      <label class="mx-2 inline-flex items-center">
                        <input class="form-checkbox text-indigo-600"
                                type="checkbox"
                                name='permissions[]'
                                value='{{$permission->id}}'
                                {{in_array($permission->id,$assignedPerms)?'checked':''}}/>
                        <span class="ml-2">{{ $permission->name }},</span>
                      </label>
                    </div>
                  @endforeach
                </div>
      </div>
</div> 


<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="{{ url()->previous() }}" class="text-default">Cancel</a>
    </div>
</div>

