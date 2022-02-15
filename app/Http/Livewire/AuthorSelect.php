<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithDatatable;

class AuthorSelect extends Component
{
    use WithDatatable;

    public $title = 'AUTORES';
    public $modalId = 'modal-select-author';
    public $spanId = 'spanCloseAuthor';
    public $searchFields = 'Nome';

    public $headerColumns = [
        ['field' => 'id', 'label' => 'Código'],
        ['field' => 'name', 'label' => 'Nome'],
        ['field' => null, 'label' => 'Ações'],
    ];

    public $bodyColumns = [
        ['field' => 'id', 'type' => 'string'],
        ['field' => 'name', 'type' => 'string'],
        ['field' => 'editButton', 'type' => 'button', 'view' => 'partials.select-button'],
    ];

    protected $repositoryClass = 'App\Repositories\AuthorRepository';

    private $data = [];

    public function mount()
    {
        $this->perPage = 10;
    }

    public function updatedSearch()
    {
        $this->emit('showAuthorModal');
    }

    public function render()
    {
        $repository = App::make($this->repositoryClass);

        $this->data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        $data = $this->data;

        return view('livewire.author-select', compact('data'));
    }

    public function select($id)
    {
        $this->emit('closeAuthorModal');

        $this->emit('selectAuthor', $id);
    }
}
