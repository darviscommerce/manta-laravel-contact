<?php

namespace App\Http\Livewire\Contact;

use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Http\Request;
use Livewire\Component;

class ContactUpdate extends Component
{
    public MantaContact $item;

    public ?string $created_by = null;
    public ?string $updated_by = null;
    public ?string $deleted_by = null;
    public ?string $company_id = null;
    public ?string $host = null;
    public ?string $pid = null;
    public ?string $locale = 'nl';
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

    public function mount(Request $request, $input)
    {
        $item = MantaContact::find($input);
        if ($item == null) {
            return redirect()->to(route('manta.contact.list'));
        }
        $this->item = $item;
        $this->company_id = $item->company_id;
        $this->host = $item->host;
        $this->locale = $item->locale;
        $this->company = $item->company;
        $this->sex = $item->sex;
        $this->firstname = $item->firstname;
        $this->lastname = $item->lastname;
        $this->email = $item->email;
        $this->phone = $item->phone;
        $this->address = $item->address;
        $this->zipcode = $item->zipcode;
        $this->city = $item->city;
        $this->country = $item->country;
        $this->birthdate = $item->birthdate;
        $this->newsletters = $item->newsletters;
        $this->comments = $item->comments;
    }

    public function render()
    {
        return view('livewire.contact.contact-update')->layout('layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'firstname' => 'required',
                'email' => 'required|email|min:1',
                'comments' => 'required',
                // 'privacy' => 'required',
            ],
            [
                'firstname.required' => 'Voornaam is verplicht',
                'email.required' => 'Email is verplicht',
                'email.email' => 'Email is niet correct',
                'comments.required' => 'Opmerkingen zijn verplicht',
                // 'privacy.required' => 'U moet akkoord gaan met de privacy verklaring',
            ]
        );

        $arr = [
            'updated_by' => auth()->user()->name,
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
        ];
        MantaContact::where('id', $this->item->id)->update($arr);
        $this->item = MantaContact::find($this->item->id);

        toastr()->addInfo('Item opgeslagen');
    }
}
