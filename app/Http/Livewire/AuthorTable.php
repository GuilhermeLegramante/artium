<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithDatatable;
use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorTable extends Component
{
    use WithPagination, WithDatatable;

    public $formRoute = 'author';
    public $entityName = 'Autor';
    public $searchFields = 'Código ou Nome';
    public $title = 'Autores';
    public $icon = 'mdi mdi-account-multiple';

    public $headerColumns = [
        ['field' => 'id', 'label' => 'Código'],
        ['field' => 'name', 'label' => 'Nome'],
        ['field' => 'created_at', 'label' => 'Data de Inclusão'],
        ['field' => 'updated_at', 'label' => 'Última Edição'],
        ['field' => null, 'label' => 'Ações']
    ];

    public function mount()
    {

    }

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
