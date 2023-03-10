<?php

namespace App\Http\Livewire\Widgets;

use App\Mail\MailContact;
use App\Models\MantaContact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class WidgetsContact extends Component
{
    public ?MantaContact $item = null;

    public ?string $host;
    public ?string $locale;
    public ?string $sex;
    public ?string $firstname;
    public ?string $lastname;
    public ?string $email;
    public ?string $phone;
    public ?string $address;
    public ?string $zipcode;
    public ?string $city;
    public ?string $country;
    public ?string $birthdate;
    public ?string $newsletters;
    public ?string $comments;
    public ?string $privacy;

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
            'locale' => $this->locale,
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
