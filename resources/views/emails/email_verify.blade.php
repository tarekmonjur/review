@component('mail::message')
# Verify Registration
### Hi, {{$user->full_name}}
#### Please verify your account by click verify button.


@component('mail::button', ['url' => url('verify-email/'.base64_encode($user->id))])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
