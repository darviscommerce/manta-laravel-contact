<x-mail::message>
{{ __('website.name') }} {{ $item->firstname }},

<p>{{ __('website.mail_received') }}</p>

<x-mail::table>
|        |          |
| ------------- | ------------- |
| {{ __('website.name') }}      | {{ $item->firstname }} {{ $item->lastname }}      |
| {{ __('website.email') }}     | {{ $item->email }} |
| {{ __('website.comments') }}      | {{ $item->comments }}      |
</x-mail::table>

{{ __('website.regards') }},<br>
{{ __('website.bikerental_julianadorp') }}
</x-mail::message>
