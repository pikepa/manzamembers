@component('mail::message')
Hello **{{$name}}**,
{{-- use double space for line break --}}
Thank you for using the MANZA online booking system!
 
Please click below to view your receipt.
@component('mail::button', ['url' => $link])
View your Receipt
@endcomponent
Sincerely,  
**The MANZA Events Team.**
@endcomponent