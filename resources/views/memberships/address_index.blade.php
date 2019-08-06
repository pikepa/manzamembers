{{-- views/members/index.blade.php --}}

       {{--     @include('dashboard.components.dash_left')  --}}  
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('success')
                    <h1 class="font-bold text-2xl m-2 ">Addresses</h1>
                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white  rounded my-4">
            <table class="text-left text-sm w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Type</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Addr 1.</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Addr 2.</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Addr 3.</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">City</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Postcode</th>
                  <th class="py-4 bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border-t  border-b border-grey-light">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($addresses as $address)
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-r border-grey-light">{{ $address->type }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $address->addr1 }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $address->addr2 }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $address->addr3}}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $address->city }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $address->postcode }}</td>
                  <td class=" border-b border-r  border-grey-light">
                    <div class="flex justify-around px-4">
                        <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $address->path() }}/edit" ><i class="far fa-edit"></i></a></div>
                        <div class="text-grey-lighter text-sm mr-2 ">
                            <form method="POST" action="{{ $address->path() }}" >
                                @method('DELETE')
                                @csrf
                                <button class="hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
                   </div>
                </div>
                </div>
            </div>
