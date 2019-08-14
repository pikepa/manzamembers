
@extends('layouts.app')

@section('title', 'Edit Receipt')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto ">
    <div class="w-1/2 mx-auto card p-6  px-16 rounded shadow">
<form action="/create_subscription.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_DijKJaVo7bp7tfGHDftk24tb00iHNN0BXc"
    data-image="/images/marketplace.png"
    data-name="Emma's Farm CSA"
    data-description="Subscription for 1 weekly box"
    data-amount="2000"
    data-label="Sign Me Up!">
  </script>
</form>
    </div>
    </div>

@endsection