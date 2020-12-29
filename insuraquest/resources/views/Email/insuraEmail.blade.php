@component('mail::message')
# Mail van InsuraQuest

Hallo, in bijlage vind je het gevraagde document.



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Met vriendelijke groeten,<br>
{{ config('app.name') }}
@endcomponent
