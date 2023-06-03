Route::group(['prefix' => config('manta-cms.prefix'), 'middleware' => config('manta-cms.middleware')], function () {
Route::get('/contact', App\Http\Livewire\Contact\ContactList::class)->name('manta.contact.list');
Route::get('/contact/toevoegen', App\Http\Livewire\Contact\ContactCreate::class)->name('manta.contact.create');
Route::get('/contact/aanpassen/{input}', App\Http\Livewire\Contact\ContactUpdate::class)->name('manta.contact.update');
Route::get('/contact/bekijken/{input}', App\Http\Livewire\Contact\ContactRead::class)->name('manta.contact.read');
});