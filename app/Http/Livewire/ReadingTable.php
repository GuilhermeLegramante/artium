<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithDatatable;
use App\Http\Livewire\Traits\WithFlashMessages;

class ReadingTable extends Component
{
    use WithDatatable, WithPagination, WithFlashMessages;
    
    public $route = 'reading';
    public $entityName = 'Leitura';
    public $searchFields = 'Código ou Nome do Livro';
    public $pageTitle = 'Leituras';
    public $icon = 'mdi mdi-book-open-page-variant';

    protected $repositoryClass = 'App\Repositories\ReadingRepository';

    public $headerColumns = [
        ['field' => 'id', 'label' => 'Código'],
        ['field' => 'book_id', 'label' => 'Livro'],
        ['field' => 'startDate', 'label' => 'Data de Início'],
        ['field' => 'endDate', 'label' => 'Data de Término'],
        ['field' => null, 'label' => 'Ações'],
    ];

    public $bodyColumns = [
        ['field' => 'id', 'type' => 'string'],
        ['field' => 'book', 'type' => 'relation', 'relationAttribute' => 'title'],
        ['field' => 'startDate', 'type' => 'timestamps'],
        ['field' => 'endDate', 'type' => 'timestamps'],
        ['field' => 'editButton', 'type' => 'button', 'view' => 'partials.edit-button'],
    ];

    public function render()
    {
        $repository = App::make($this->repositoryClass);
        $data = $repository
            ->all($this->search, $this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);


        return view('livewire.reading-table', [
            'data' => $data,
        ]);
    }
}
