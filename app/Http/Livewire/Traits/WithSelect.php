<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\App;

trait WithSelect
{
    use WithDatatable;

    private $data = [];

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

    public function updatedSearch()
    {
        $this->emit($this->showModal);
    }

    public function search()
    {
        $this->perPage = 10;

        $repository = App::make($this->repositoryClass);

        $this->data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function select($id)
    {
        $this->emit($this->closeModal);
        $this->emit($this->selectModal, $id);
    }

}
