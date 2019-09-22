@component('mail::message')
Hello **{{$booking->name}}**,
{{-- use double space for line break --}}
Thank you for using the MANZA online booking system!
 
Please click below to view your receipt.
@component('mail::button', ['url' => $booking->receipt_url])
View your Receipt
@endcomponent
and here to
@component('mail::button', ['url' => $booking->fullpath()])
View your Booking   
@endcomponent
Sincerely,  
**The MANZA Events Team.**
@endcomponent