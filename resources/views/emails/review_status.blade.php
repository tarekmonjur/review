@component('mail::message')
# Review Update
### Hi, {{$review->user->full_name}}
#### Your review has been @if($review->status == 0) **Pending**  @elseif($review->status == 1) **Approved** @elseif($review->status == 2) **Reject** @endif

##### Please check your reviews

@component('mail::button', ['url' => url('/reviews/show')])
See review
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
