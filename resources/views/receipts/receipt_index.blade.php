{{-- views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Memberships')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

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
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Memb No</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Memb Name</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Rcpt Date</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Receipt No.</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Amount</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t border-b border-r  border-grey-light">Memb Type</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-t  border-b border-r  border-grey-light">Term</th>
                </tr>
              </thead>
              <tbody>
                @foreach($memberships as $membership)
                <tr class="hover:bg-grey-lighter">
                  <td class="underline py-4 px-6 border-b border-r border-grey-light"><a href='/membership/{{ $membership->id }}'>{{ $membership->memb_no}}</td></a>
                  <td class="py-4 px-6 border-b border-r border-grey-light">{{ $membership->surname }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light">{{ $membership->receipts[0]->formatted_receipt_date}}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $membership->receipts[0]->receipt_no }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">RM {{ number_format($membership->receipts[0]->amount/100,2,'.', ',')}}</td>

                  <td class="py-4 px-6 border-b border-r border-grey-light ">{{ $membership->mship['category'] }}</td>
                  <td class="py-4 px-6 border-b border-r border-grey-light text-center">{{ $membership->term['category'] }}</td>
                  <td class=" border-b border-r  border-grey-light">
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
                   </div>
                  <p>{{ $memberships->count() }}</p>
                </div>
                </div>
            </div>

         </div>
    </div>

@endsection