@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for choosing Mailtrap!

Click below to start working right now
Новое приглашение на собеседование
@component('mail::button', ['url' => $link])
Go to your inbox
@endcomponent
Sincerely,  
Mailtrap team.
@endcomponent