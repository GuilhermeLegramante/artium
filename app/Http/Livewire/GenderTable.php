<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithDatatable;
use App\Http\Livewire\Traits\WithFlashMessages;
use App\Repositories\GenderRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class GenderTable extends Component
{
    use WithPagination, WithDatatable, WithFlashMessages;

    public $route = 'gender';
    public $entityName = 'Gênero';
    public $searchFields = 'Código ou Nome';
    public $title = 'Gêneros';
    public $icon = 'mdi mdi-contacts';

    public $headerColumns = [
        ['field' => 'id', 'label' => 'Código'],
        ['field' => 'name', 'label' => 'Nome'],
        ['field' => 'created_at', 'label' => 'Data de Inclusão'],
        ['field' => 'updated_at', 'label' => 'Última Edição'],
        ['field' => null, 'label' => 'Ações'],
    ];

    public $bodyColumns = [
        ['field' => 'id', 'type' => 'string'],
        ['field' => 'name', 'type' => 'string'],
        ['field' => 'created_at', 'type' => 'timestamps'],
        ['field' => 'updated_at', 'type' => 'timestamps'],
        ['field' => 'editButton', 'type' => 'button', 'view' => 'partials.edit-button'],
    ];

    public function render()
    {
        $repository = App::make(GenderRepository::class);
        $data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.gender-table', [
            'data' => $data,
        ]);    }
}
