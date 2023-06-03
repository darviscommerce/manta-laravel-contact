<?php

namespace App\Http\Livewire\Contact;

use App\Mail\MailContact;
use Illuminate\Http\Request;
use Livewire\Component;
use Manta\LaravelContact\Models\MantaContact;
use Illuminate\Support\Facades\Mail;

class ContactRead extends Component
{
    public MantaContact $item;

    public ?string $email = null;

    public int $resend = 0;
    public int $send = 0;

    public function mount(Request $request, $input)
    {
        $item = MantaContact::find($input);
        if ($item == null) {
            return redirect()->to(route('manta.contact.list'));
        }
        $this->item = $item;
        $this->email = $item->email;
    }

    public function render()
    {
        return view('livewire.contact.contact-read')->layout('layouts.manta-bootstrap');
    }

    public function resend()
    {
        $this->resend = 1;
        $this->send = 0;
    }

    public function send()
    {

        $this->validate(
            [
                'email' => 'required|email|min:1',
            ],
            [
                'email.required' => 'Email is verplicht',
                'email.email' => 'Email is niet correct',
            ]
        );

        Mail::to($this->email)->send(new MailContact($this->item));

        $this->send = 1;
    }
}
