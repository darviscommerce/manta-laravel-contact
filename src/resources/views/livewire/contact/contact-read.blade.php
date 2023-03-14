<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manta.contact.list') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span class="fi fi-{{ $item->locale == 'en' ? 'gb' : $item->locale }}"></span>
                {{ $item->sex }}
                {{ $item->firstname }}
                {{ $item->lastname }} bekijken</li>
        </ol>
    </nav>
        <div class="mb-3 row">
            <label for="firstname" class="col-sm-2 col-form-label">Voornaam</label>
            <div class="col-sm-4">
               {{ $firstname }}
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="mb-3 row">
            <label for="lastname" class="col-sm-2 col-form-label">Achternaam</label>
            <div class="col-sm-4">
                {{ $lastname }}
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="mb-3 row">
            <label for="comments" class="col-sm-2 col-form-label">Opmerkingen</label>
            <div class="col-sm-4">
                {!! nl2br($comments) !!}
            </div>
            <label for="initials" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">

            </div>
        </div>
</div>
