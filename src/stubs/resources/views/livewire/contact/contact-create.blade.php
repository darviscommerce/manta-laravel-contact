<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manta.contact.list') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reactie toevoegen</li>
        </ol>
    </nav>

    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
        <div class="mb-3 row">
            <label for="locale" class="col-sm-2 col-form-label">Taal</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm @error('locale')is-invalid @enderror" id="locale"
                    wire:model="locale">
                    <option value="nl">nl</option>
                    <option value="en">en</option>
                    <option value="de">de</option>
                    <option value="se">se</option>
                    <option value="es">es</option>
                </select>
                @error('locale')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="company" class="col-sm-2 col-form-label">Bedrijf</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('company')is-invalid @enderror"
                    id="company" wire:model="company">
                @error('company')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Aanspreektitel</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('title')is-invalid @enderror"
                    id="title" wire:model="title">
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="sex" class="col-sm-2 col-form-label">Geslacht</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('sex')is-invalid @enderror"
                    id="title" wire:model="sex">
                @error('sex')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="firstname" class="col-sm-2 col-form-label">Voornaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('firstname')is-invalid @enderror"
                    id="firstname" wire:model="firstname">
                @error('firstname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('lastname')is-invalid @enderror"
                    id="lastname" wire:model="lastname">
                @error('lastname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input type="email" class="form-control form-control-sm @error('email')is-invalid @enderror"
                    id="email" wire:model="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="phone" class="col-sm-2 col-form-label">Telefoon</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('phone')is-invalid @enderror"
                    id="phone" wire:model="phone">
                @error('phone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="birthdate" class="col-sm-2 col-form-label">Geboortedatum</label>
            <div class="col-sm-4">
                <input type="date" class="form-control form-control-sm @error('birthdate')is-invalid @enderror"
                    id="birthdate" wire:model="birthdate">
                @error('birthdate')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-sm-2 col-form-label">Adres</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('address')is-invalid @enderror"
                    id="address" wire:model="address">
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="zipcode" class="col-sm-2 col-form-label">Postcode</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('zipcode')is-invalid @enderror"
                    id="zipcode" wire:model="zipcode">
                @error('zipcode')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="city" class="col-sm-2 col-form-label">Woonplaats</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('city')is-invalid @enderror"
                    id="city" wire:model="city">
                @error('city')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="country" class="col-sm-2 col-form-label">Land</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('country')is-invalid @enderror"
                    id="country" wire:model="country">
                @error('country')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="internal_contact" class="col-sm-2 col-form-label">Intern contactpersoon</label>
            <div class="col-sm-4">
                <input type="text"
                    class="form-control form-control-sm @error('internal_contact')is-invalid @enderror"
                    id="internal_contact" wire:model="internal_contact">
                @error('internal_contact')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="newsletters" class="col-sm-2 col-form-label">Nieuwsbrief ontvangen?</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm @error('newsletters')is-invalid @enderror"
                    id="newsletters" wire:model="newsletters">
                    <option value="1">Ja</option>
                    <option value="0">Nee</option>
                </select>
                @error('newsletters')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="subject" class="col-sm-2 col-form-label">Onderwerp</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('subject')is-invalid @enderror"
                    id="subject" wire:model="subject">
                @error('subject')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="comments" class="col-sm-2 col-form-label">Opmerkingen</label>
            <div class="col-sm-4">
                <textarea class="form-control form-control-sm @error('comments')is-invalid @enderror" rows="4" id="comments"
                    wire:model="comments"></textarea>
                @error('comments')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-12">
                {{-- @include('includes.form_error') --}}
                <input class="btn btn-primary" type="submit" value="Opslaan" wire:loading.class="btn-secondary"
                    wire:loading.attr="disabled" />
            </div>
        </div>
    </form>
</div>
