<?php

namespace App\Http\Livewire;

use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorTable extends Component
{
    use WithPagination;

    public $perPage = 30;

    protected $paginationTheme = 'bootstrap';

    protected $filters = [
        'sortBy' => 'name',
        'sortDirection' => 'asc',
    ];

    public function mount()
    {

    }

    public function render()
    {
        $repository = App::make(AuthorRepository::class);
        $data = $repository->all($this->filters)->paginate($this->perPage);

        return view('livewire.author-table', [
            'data' => $data,
        ]);
    }

}
