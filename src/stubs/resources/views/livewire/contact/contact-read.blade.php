<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manta.contact.list') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span
                    class="fi fi-{{ $item->locale == 'en' ? 'gb' : $item->locale }}"></span>
                {{ $item->sex }}
                {{ $item->firstname }}
                {{ $item->lastname }} bekijken</li>
        </ol>
    </nav>
    <div class="mt-3 row">
        <div class="col-4">
            <a href="{{ route('manta.contact.update', ['input' => $item->id]) }}" class="btn btn-sm btn-warning"><i
                    class="fa-solid fa-pen-to-square"></i> Aanpassen</a>
            <button wire:click="resend" class="btn btn-sm btn-primary"><i class="fa-solid fa-envelope"></i> Opnieuw
                mailen</button>
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
    </div>
    @if ($resend == 1)
        <p>
            <hr>
        <h4 class="text-success">Verstuur opnieuw</h4>
        </p>
        @if ($send == 1)
            <div class="alert alert-success" role="alert">
                Het bericht is opnieuw verstuurd naar {{ $email }}
            </div>
        @else
            <div class="mb-3 row">
                <label for="email" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control form-control-sm @error('email')is-invalid @enderror"
                        id="email" wire:model="email">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-8">
                    <button wire:click="send" class="btn btn-sm btn-primary"><i class="fa-solid fa-envelope"></i>
                        Versturen</button>
                </div>
            </div>
        @endif

    @endif
    <p>
        <hr>
    </p>
    <h4 class="text-primary">{{ $item->firstname }}
        {{ $item->lastname }} bekijken </h4>
    <div class="mb-3 row">
        <label for="locale" class="col-sm-2 col-form-label">Taal</label>
        <div class="col-sm-4">
            {{ $item->locale }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="company" class="col-sm-2 col-form-label">Bedrijf</label>
        <div class="col-sm-4">
            {{ $item->company }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Aanspreektitel</label>
        <div class="col-sm-4">
            {{ $item->title }}
        </div>
        <label for="sex" class="col-sm-2 col-form-label">Geslacht</label>
        <div class="col-sm-4">
            {{ $item->sex }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="firstname" class="col-sm-2 col-form-label">Voornaam</label>
        <div class="col-sm-4">
            {{ $item->firstname }}
        </div>
        <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
        <div class="col-sm-4">
            {{ $item->lastname }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            {{ $item->email }}
        </div>
        <label for="phone" class="col-sm-2 col-form-label">Telefoon</label>
        <div class="col-sm-4">
            {{ $item->phone }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="birthdate" class="col-sm-2 col-form-label">Geboortedatum</label>
        <div class="col-sm-4">
            {{ $item->birthdate }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">Adres</label>
        <div class="col-sm-4">
            {{ $item->address }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="zipcode" class="col-sm-2 col-form-label">Postcode</label>
        <div class="col-sm-4">
            {{ $item->zipcode }}
        </div>
        <label for="city" class="col-sm-2 col-form-label">Woonplaats</label>
        <div class="col-sm-4">
            {{ $item->city }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="country" class="col-sm-2 col-form-label">Land</label>
        <div class="col-sm-4">
            {{ $item->country }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="internal_contact" class="col-sm-2 col-form-label">Intern contactpersoon</label>
        <div class="col-sm-4">
            {{ $item->internal_contact }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="newsletters" class="col-sm-2 col-form-label">Nieuwsbrief ontvangen?</label>
        <div class="col-sm-4">
            {{ $item->newsletters == 1 ? 'Ja' : 'Nee' }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="subject" class="col-sm-2 col-form-label">Onderwerp</label>
        <div class="col-sm-4">
            {{ $item->subject }}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="comments" class="col-sm-2 col-form-label">Opmerkingen</label>
        <div class="col-sm-4">
            {!! $item->comments !!}
        </div>
        <label for="initials" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-5">
        </div>
    </div>
</div>
