
@extends('layouts.app')

@section('title', 'Submit Payment')

@section('content')

@include('layouts.partials.pageheader')

<div  class="pt-16 container mx-auto">
    <div class="lg:w-1/2 lg:mx-auto card p-6 md:py-6 md:px-16 rounded shadow">
        <h1 class="text-2xl font-semibold mb-10 text-center">
            Enter Card Details
        </h1>
        <form action="/charge" method="post" id="payment-form">
          <div class="form-row">
            <label    class="text-xl font-semibold">
              Credit or Debit card
            </label>
            <div id="card-element" class="StripeElement" ></div>
            <div id="card-errors" role="alert"></div>
          </div>
          <input type="submit" class="btn btn-manza  mt-4" value="Submit Payment">
        </form>
    </div>
</div>
<script type="application/javascript">

var stripe = Stripe(env('STRIPE_PUBLIC_KEY'));

// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');


// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection
