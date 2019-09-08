@component('mail::message')
Hello **{{$name}}**,
{{-- use double space for line break --}}
Your message has been received and forwarded to the appropriate person.

From    : {{ $email }}  
Subject : {{ $subject }}  
Content : {{ $content }}  

Thank you for using the MANZA online message system!
 
Sincerely,  
**The MANZA Team.**
@endcomponent