@extends('layouts.app')

@section('title', 'Addresses')

@section('content')

@include('layouts.partials.pageheader')

    <div class="container mx-auto pb-4">

         <div class="flex flex-col md:flex-row justify-between">

            {{--  @include('dashboard.components.dash_left') --}}

            <div class="container mx-auto pb-4">
                <div class="text-center">
                  @include('messages')
                    <h1 class="font-bold text-3xl m-2 ">{{ $report_title }}</h1>

                </div>
                <div class="flex flex-col ">
                    <div class=" mx-auto">
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Memb No.</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Label Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Addr1</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Addr2</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Addr3</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">City</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Postcode</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border  border-grey-light">Country</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($rows as $key=>$row)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border underline border-grey-light text-center"><a href="/membership/{{ $row->member_id }}">{{ $row->member_no }}</a></td>
                          <td class="py-4 px-6 border border-grey-light text-center">{{ $row->mailing_label }}</td>
                          <td class="py-4 px-6 border border-grey-light">{{ $row->addr1 }}</td>
                          <td class="py-4 px-6 border border-grey-light">{{ $row->addr2 }}</a></td>
                          <td class="py-4 px-6 border border-grey-light text-center">{{ $row->addr3 }}</td>
                          <td class="py-4 px-6 border border-grey-light text-center">{{ $row->city }}</td>
                          <td class="py-4 px-6 border border-grey-light text-center">{{ $row->postcode }}</td>
                          <td class="py-4 px-6 border border-grey-light text-center">{{ $row->country }}</td>

                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
            </div>

         </div>

    </div>
@endsection
