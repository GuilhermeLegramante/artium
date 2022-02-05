<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use App\Repositories\AuthorRepository;
use App\Http\Livewire\Traits\WithDatatable;

class AuthorTable extends Component
{
    use WithPagination, WithDatatable;

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
