@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you using the MANZA online booking system!
 
Click below to view your receipt right now
@component('mail::button', ['url' => $link])
View your Receipt
@endcomponent
Sincerely,  
The MANZA Events team.
@endcomponent