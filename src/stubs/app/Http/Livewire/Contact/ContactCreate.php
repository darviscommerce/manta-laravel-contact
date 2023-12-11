<?php

namespace App\Http\Livewire\Contact;

use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class ContactCreate extends Component
{
    public ?MantaContact $item = null;

    public ?string $created_by = null;
    public ?string $updated_by = null;
    public ?string $deleted_by = null;
    public ?string $company_id = null;
    public ?string $host = null;
    public ?string $pid = null;
    public ?string $locale = 'NL';
    public ?string $company = null;
    public ?string $title = null;
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
    public ?string $newsletters = '1';
    public ?string $subject = null;
    public ?string $comments = null;
    public ?string $internal_contact = null;

    public function mount(Request $request)
    {
        $this->host = request()->getHost();
        $this->locale = config('manta-cms.locale');
        //
        if (env('APP_ENV') != 'production') {
            $this->title = fake('nl_NL')->randomElement(['Dhr.', 'Mevr.']);
            $this->sex = fake('nl_NL')->randomElement(['man', 'vrouw', 'het']);
            $this->company = fake('nl_NL')->company();
            $this->firstname = fake('nl_NL')->firstName();
            $this->lastname = fake('nl_NL')->lastName();
            $this->email = fake('nl_NL')->unique()->safeEmail();
            $this->phone = fake('nl_NL')->phoneNumber();
            $this->address = fake('nl_NL')->streetAddress();
            $this->zipcode = fake('nl_NL')->postcode();
            $this->city = fake('nl_NL')->city();
            $this->country = fake('nl_NL')->countryCode();
            $this->birthdate = fake('nl_NL')->date('Y-m-d', '-15 years');
            $this->subject = fake('nl_NL')->sentence('5');
            $this->comments = fake('nl_NL')->paragraph('3');
            $this->internal_contact = fake('nl_NL')->name();
        }
    }

    public function render()
    {
        return view('livewire.contact.contact-create')->layout('layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'title' => 'required|min:1',
            ],
            [
                'title.required' => 'Titel is verplicht',
            ]
        );

        $item = [
            'created_by' => auth()->user()->name,
            'company_id' => (int)$this->company_id,
            'host' => $this->host,
            'pid' => $this->pid,
            'locale' => $this->locale,

            'company' => $this->company,
            'title' => $this->title,
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
            'subject' => $this->subject,
            'comments' => $this->comments,
            'internal_contact' => $this->internal_contact,
            'ip' => request()->ip(),
        ];
        MantaContact::create($item);

        toastr()->addInfo('Item opgeslagen');

        return redirect()->to(route('manta.contact.list'));
    }
}
