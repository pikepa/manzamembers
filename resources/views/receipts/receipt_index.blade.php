{{-- views/memberships/memb_index.blade.php --}}
<div class="mt-4 w-5/6 mx-auto items-center flex justify-between max-w-5xl">
  <div>
      <a class=" mt-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark">Receipts</>
  </div>
  <div class="text-right text-grey-lighter text-sm mr-2 hover:font-semibold"><a href="\receipt\create\{{ $membership->id }}" ><i class="fas fa-plus"></i></a></div>
</div>
     <div class="flex flex-col ">
        <div class="max-w-5xl mx-auto">
          <div class="bg-white shadow-md rounded my-4">
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

