<?php

namespace App\Http\Livewire\Contact;

use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class ContactCreate extends Component
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

    public function mount(Request $request)
    {

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

        $items = [
            'added_by' => auth()->user()->name,
            'company_id' => (int)$this->company_id,
            'host' => $this->host,
            'pid' => $this->pid,
            'locale' => $this->locale,
            'title' => $this->title,
            'slug' => Str::of($this->slug)->slug('-'),
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'fixed' => $this->fixed,
            'fullpage' => $this->fullpage
        ];
        MantaContact::create($items);

        toastr()->addInfo('Item opgeslagen');

        return redirect()->to(route('manta.contact.list'));
    }
}
