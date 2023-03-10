<?php

use Manta\LaravelContact\Http\Livewire\Contact\ContactCreate;
use Manta\LaravelContact\Http\Livewire\Contact\ContactList;
use Manta\LaravelContact\Http\Livewire\Contact\ContactUpdate;
use Illuminate\Support\Facades\Route;
use Manta\LaravelContact\Http\Livewire\Contact\ContactUploads;

Route::get('/pagina', ContactList::class)->name('manta.contact.list');
Route::get('/pagina/toevoegen', ContactCreate::class)->name('manta.contact.create');
Route::get('/pagina/aanpassen/{input}', ContactUpdate::class)->name('manta.contact.update');
