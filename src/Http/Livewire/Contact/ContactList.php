<?php

namespace App\Http\Livewire\Contact;

use Manta\LaravelContact\Models\MantaContact;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;
    use WithSorting;

    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];

    public string $show = 'active';
    public ?int $trashed = null;
    public ?string $deleteId = null;

    public function mount()
    {
        $this->sortBy = 'title';
        $this->sortDirection = 'ASC';
    }

    public function render()
    {
        $obj = MantaContact::where('locale', config('manta-cms.locale'))->orderBy($this->sortBy, $this->sortDirection);
        if($this->show == 'trashed'){
            $obj->onlyTrashed();
        }
        if($this->search){
            $keyword = $this->search;
            $obj->where(function ($query) use($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                   ->orWhere('content', 'like', '%' . $keyword . '%');
              });
        // ->where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%');
        }
        $items = $obj->paginate(20);
        return view('livewire.contact.contact-list', ['items' => $items])->layout('layouts.manta-bootstrap');
    }

    public function loadTrash()
    {
        $this->trashed = count(MantaContact::onlyTrashed()->get());
    }

    public function show($show)
    {
        $this->show = $show;
    }

    public function delete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteCancel()
    {
        $this->deleteId = null;
    }

    public function deleteConfirm()
    {
        MantaContact::find($this->deleteId)->delete();
        $this->deleteId = null;
        $this->trashed = count(MantaContact::onlyTrashed()->get());
    }

    public function restore($id)
    {
        MantaContact::withTrashed()->where('id', $id)->restore();
        $this->trashed = count(MantaContact::onlyTrashed()->get());
        $this->show = 'active';
    }
}
