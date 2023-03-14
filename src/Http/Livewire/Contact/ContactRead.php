<?php

namespace App\Http\Livewire\Contact;

use Illuminate\Http\Request;
use Livewire\Component;
use Manta\LaravelContact\Models\MantaContact;

class ContactRead extends Component
{
    public MantaContact $item;

    public ?string $company_id = null;
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
        $this->privacy = $item->privacy;
    }

    public function render()
    {
        return view('livewire.contact.contact-read')->layout('layouts.manta-bootstrap');
    }
}
