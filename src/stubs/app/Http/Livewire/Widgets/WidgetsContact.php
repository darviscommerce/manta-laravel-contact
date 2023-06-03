<?php

namespace App\Http\Livewire\Widgets;

use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\MailContact;

class WidgetsContact extends Component
{
    public ?MantaContact $item = null;

    public ?string $host = null;
    public ?string $locale = null;
    public ?string $sex = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $zipcode = null;
    public ?string $city = null;
    public ?string $country = null;
    public ?string $birthdate = null;
    public ?string $newsletters = null;
    public ?string $comments = null;
    public ?string $privacy = null;

    public function render()
    {
        return view('livewire.widgets.widgets-contact');
    }

    public function store($input)
    {
        $this->validate(
            [
                'firstname' => 'required',
                'email' => 'required|email|min:1',
                'comments' => 'required',
                'privacy' => 'required',
            ],
            [
                'firstname.required' => 'Voornaam is verplicht',
                'email.required' => 'Email is verplicht',
                'email.email' => 'Email is niet correct',
                'comments.required' => 'Opmerkingen zijn verplicht',
                'privacy.required' => 'U moet akkoord gaan met de privacy verklaring',
            ]
        );

        $items = [
            'host' => request()->getHost(),
            'locale' => app()->getLocale(),
            'sex' => $this->sex,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'country' => $this->country,
            'birthdate' => $this->birthdate,
            'newsletters' => $this->newsletters,
            'comments' => $this->comments,
        ];
        $this->item = MantaContact::create($items);
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new MailContact($this->item));
        Mail::to($this->email)->send(new MailContact($this->item));

        // toastr()->addInfo('De mail is verzonden');
    }
}
