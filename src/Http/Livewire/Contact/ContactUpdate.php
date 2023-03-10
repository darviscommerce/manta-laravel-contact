<?php

namespace Manta\LaravelContact\Http\Livewire\Contact;

use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Http\Request;
use Livewire\Component;

class ContactUpdate extends Component
{
    public MantaContact $item;

    public ?string $added_by = null;
    public ?string $changed_by = null;
    public ?string $company_id = '1';
    public ?string $host = null;
    public ?string $locale = null;
    public ?string $title = null;
    public ?string $slug = null;
    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $excerpt = null;
    public ?string $content = null;
    public ?string $fixed = null;
    public ?string $fullpage = null;

    public function mount(Request $request, $input)
    {
        $item = MantaContact::find($input);
        if ($item == null) {
            return redirect()->to(route('manta.contact.list'));
        }
        $this->item = $item;
        $this->added_by = $item->added_by;
        $this->changed_by = $item->changed_by;
        $this->company_id = $item->company_id;
        $this->host = $item->host;
        $this->locale = $item->locale;
        $this->title = $item->title;
        $this->slug = $item->slug;
        $this->seo_title = $item->seo_title;
        $this->seo_description = $item->seo_description;
        $this->excerpt = $item->excerpt;
        $this->content = $item->content;
        $this->fixed = $item->fixed;
        $this->fullpage = $item->fullpage;
    }

    public function render()
    {
        return view('manta-laravel-contact::livewire.contact.contact-update')->layout('manta-laravel-cms::layouts.manta-bootstrap');
    }

    public function store($input)
    {
        $this->validate(
            [
                'title' => 'required|min:1',
                'slug' => 'required|min:1',
            ],
            [
                'title.required' => 'Titel is verplicht',
                'slug.required' => 'Slug is verplicht',
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
        MantaContact::where('id', $this->item->id)->update($items);

        toastr()->addInfo('Item opgeslagen');
    }
}
