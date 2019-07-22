{{-- views/members/index.blade.php --}}

       {{--     @include('dashboard.components.dash_left')  --}}  
            
            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('success')
                    <h1 class="font-bold text-3xl m-2 ">Receipts</h1>
                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white  rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Rcpt Date</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Receipt No.</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Payee</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Amount</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Source</th>
                  <th class="py-4 bg-grey-lightest font-bold uppercase text-sm text-center text-grey-dark border-t  border-b border-grey-light">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($receipts as $receipt)
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-r border-grey-light">{{ $receipt->formatted_receipt_date }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $receipt->receipt_no }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $receipt->payee }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">RM {{ number_format($receipt->amount/100,2,'.', ',')}}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $receipt->source }}</td>
                  <td class=" border-b border-r  border-grey-light">
                    <div class="flex justify-around px-4">
                        <div class="text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="{{ $receipt->path() }}/edit" ><i class="far fa-edit"></i></a></div>
                        <div class="text-grey-lighter text-sm mr-2 ">
                            <form method="POST" action="{{ $receipt->path() }}" >
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
