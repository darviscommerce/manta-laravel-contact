<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manta.contact.list') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span class="fi fi-{{ $item->locale == 'en' ? 'gb' : $item->locale }}"></span>
                {{ $item->sex }}
                {{ $item->firstname }}
                {{ $item->lastname }} aanpassen</li>
        </ol>
    </nav>
    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
        <div class="mb-3 row">
            <label for="firstname" class="col-sm-2 col-form-label">Voornaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('firstname')is-invalid @enderror"
                    id="firstname" wire:model="firstname">
                @error('firstname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="mb-3 row">
            <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('lastname')is-invalid @enderror"
                    id="lastname" wire:model="lastname">
                @error('lastname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('email')is-invalid @enderror"
                    id="email" wire:model="email">
                @error('email')
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
                <textarea class="form-control form-control-sm @error('comments')is-invalid @enderror"
                    id="comments" wire:model="comments"></textarea>
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
