<?php

use App\Http\Livewire\Contact\ContactCreate;
use App\Http\Livewire\Contact\ContactList;
use App\Http\Livewire\Contact\ContactUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/contact', ContactList::class)->name('manta.contact.list');
Route::get('/contact/toevoegen', ContactCreate::class)->name('manta.contact.create');
Route::get('/contact/aanpassen/{input}', ContactUpdate::class)->name('manta.contact.update');
