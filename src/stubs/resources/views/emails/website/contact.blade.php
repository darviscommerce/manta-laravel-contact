<x-mail::message>
    {{ __('manta_contact.name') }} {{ $item->firstname }},

    <p>{{ __('manta_contact.mail_received') }}</p>

    <x-mail::table>
        | | |
        | ------------- | ------------- |
        | {{ __('manta_contact.name') }} | {{ $item->firstname }} {{ $item->lastname }} |
        | {{ __('manta_contact.email') }} | {{ $item->email }} |
        | {{ __('manta_contact.comments') }} | {{ $item->comments }} |
    </x-mail::table>

    {{ __('manta_contact.regards') }},<br>
    {{ __('manta_contact.sender_name') }}
</x-mail::message>
