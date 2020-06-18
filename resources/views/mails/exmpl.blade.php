@component('mail::message')
Здравствуйте, **{{$name}}**,  {{-- use double space for line break --}}
Новое приглашение на собеседование

Нажмите ниже, чтобы пройти собеседование прямо сейчас
@component('mail::button', ['url' => $link])
Пройти собеседование
@endcomponent
Sincerely,  
Crew MSG team (crewmsg.com).
@endcomponent