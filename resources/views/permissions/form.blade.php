@csrf

@include ('errors')
<div class="field mb-6">
    <label class="block">
      <span class="text-gray-700">Name</span>
        <input  type="text" class="form-input mt-1 block w-full" 
                name='name'
                placeholder="Enter the name of the category."
                value="{{old('name', $permission->name)}}">
    </label>
</div>
{{--
    @if(!$roles->isEmpty()) 
       <div class="field mt-4 mb-4">
          <div class="block">
                <div class="mt-4 flex">
                  @foreach ($roles as $role) 
                      <label class="mx-2 inline-flex items-center">
                        <input class="form-checkbox text-indigo-600"
                                type="checkbox"
                                name='roles[]'
                                value='{{$role->id}}'
                                {{in_array($role->id,$assignedRoles)?'checked':''}}/>
                        <span class="ml-2">{{ $role->name }},</span>
                      </label>
                  @endforeach
              </div>
          </div>
    </div> 
     
    @endif
--}}
<div class="field">
    <div class="control">
        <button type="submit" class="btn btn-blue is-link mr-2">{{ $buttonText }}</button>

        <a href="/permissions" class="text-default">Cancel</a>
    </div>
</div>

