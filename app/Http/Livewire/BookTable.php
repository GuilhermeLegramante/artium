<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithDatatable;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use App\Repositories\BookRepository;
use App\Http\Livewire\Traits\WithFlashMessages;

class BookTable extends Component
{
    use WithDatatable, WithPagination, WithFlashMessages;

    public $route = 'book';
    public $entityName = 'Livro';
    public $searchFields = 'Código ou Nome';
    public $title = 'Meus Livros';
    public $icon = 'mdi mdi-library-books';

    protected $repositoryClass = 'App\Repositories\BookRepository';

    public $headerColumns = [
        ['field' => 'id', 'label' => 'Código'],
        ['field' => 'name', 'label' => 'Nome'],
        ['field' => 'gender', 'label' => 'Gênero'],
        ['field' => 'acquisitionDate', 'label' => 'Data de Aquisição'],
        ['field' => 'editionYear', 'label' => 'Edição'],
        ['field' => null, 'label' => 'Ações'],
    ];

    public $bodyColumns = [
        ['field' => 'id', 'type' => 'string'],
        ['field' => 'name', 'type' => 'string'],
        ['field' => 'gender', 'type' => 'string'],
        ['field' => 'acquisitionDate', 'type' => 'timestamps'],
        ['field' => 'editionYear', 'type' => 'year'],
        ['field' => 'editButton', 'type' => 'button', 'view' => 'partials.edit-button'],
    ];

    public function render()
    {
        $repository = App::make($this->repositoryClass);
        $data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.book-table', [
            'data' => $data,
        ]);}
}
