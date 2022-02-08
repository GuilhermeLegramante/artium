<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithDatatable;
use App\Http\Livewire\Traits\WithFlashMessages;
use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorTable extends Component
{
    use WithPagination, WithDatatable, WithFlashMessages;

    public $route = 'author';
    public $entityName = 'Autor';
    public $searchFields = 'Código ou Nome';
    public $title = 'Autores';
    public $icon = 'mdi mdi-account-multiple';

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
        $repository = App::make(AuthorRepository::class);
        $data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.author-table', [
            'data' => $data,
        ]);
    }

}
