@component('mail::message')
![Event Image]({{ $url }})  

**Thank You for Your Order**

**Your Ticket Reference :** {{ $ticket_ref }}

Hi **{{$name}}**,
{{-- use double space for line break --}}
Congratulations on the purchase of your tickets for the  

**MANZA {{ $title }}**  
**Date :** {{ $event_date }}  
**Venue :** {{ $venue }}  
**Timing :** {{ $timing }}

Please either print this receipt out or retain it on your phone
as proof of ticket purchase.

**Date of Purchase :** {{ $confirmed_at->format('d M Y') }}  
**Tickets Purchased :** {{ $tickets }}    
**{{ $add_title }} :** {{ $add_info }}  


Sincerely,  
**The MANZA Events Team**  
manzatourskl@gmail.com 
@endcomponent