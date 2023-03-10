<div class="formulier">
    @if ($this->item)
    <div class="bericht-verzonden w-form-done" style="display: inline-block;">
        <div>{{ __('website.form_ok') }}</div>
    </div>
    @else
    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))" name="wf-form-Fiets-reserveren"
        action="javascript:;">
        <x-website.text itemid="4" />
        <div class="w-layout-grid form-grid">
            <div id="w-node-_647c7c8b-c083-66df-e382-d337e83f2036-64057be8" class="form-grid_child">
                <label for="firstname" class="field-label">{{ __('website.firstname') }} *</label>
                <input type="text" class="input-field w-input" wire:model.defer="firstname" name="firstname" placeholder=""
                    id="firstname">
                    @error('firstname') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div id="w-node-f1856da5-6e24-3b93-ccea-f05c8934a74a-64057be8" class="form-grid_child">
                <label for="lastname" class="field-label">{{ __('website.lastname') }}</label>
                <input type="text" class="input-field w-input" wire:model.defer="lastname" name="lastname" placeholder=""
                    id="lastname">
                    @error('lastname') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div id="w-node-ae6db6db-3ce8-5228-9564-58066611c7f6-64057be8" class="form-grid_child">
                <label for="email" class="field-label">{{ __('website.email') }} *</label>
                <input type="text" class="input-field w-input" wire:model.defer="email" name="email" placeholder=""
                    id="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div id="w-node-a5486d71-69d2-f0f4-e547-2f7d0336b8a6-64057be8" class="form-grid_child">
                <label for="comments" class="field-label">{{ __('website.comments') }} *</label>
                <textarea placeholder="" wire:model.defer="comments" name="comments" name="comments" class="input-field is--large w-input"></textarea>
                @error('comments') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <label class="w-checkbox checkbox-field">
            <input type="checkbox" wire:model.defer="privacy" id="privacy" name="privacy" class="w-checkbox-input">
            <span class="w-form-label" for="privacy">
                {{ __('website.privacy_agree') }} <x-website.link itemid="7" target="_blank" />
                @error('privacy') <div class="error">{{ $message }}</div> @enderror
            </span>
        </label>
        <input type="submit" value="Versturen" class="button green submit w-button">
    </form>
    @endif
    {{-- <div class="w-form-fail">
        <div>{{ __('website.form_oops') }}</div>
    </div> --}}
</div>
