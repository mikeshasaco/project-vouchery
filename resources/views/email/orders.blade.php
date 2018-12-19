@component('mail::message')
# Order Receipt

**Company Name:** {{ Auth::user()->company }}

**Company Email:** {{ Auth::user()->email }}

**Order Name:** {{ $submission->title }}

**Order Total:** ${{ $submission->submissionprice }}



@component('mail::button', ['url' => '', 'color' => 'red'])
Check out Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
