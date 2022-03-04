<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSelect;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class AuthorSelect extends Component
{
    use WithSelect;

    public $title = 'AUTORES';
    public $modalId = 'modal-select-author';
    public $spanId = 'spanCloseAuthor';
    public $searchFields = 'Nome';

    public $closeModal = 'closeAuthorModal';
    public $selectModal = 'selectAuthor';
    public $showModal = 'showAuthorModal';

    protected $repositoryClass = 'App\Repositories\AuthorRepository';

    public function render()
    {
        $this->search();

        $data = $this->data;

        return view('livewire.author-select', compact('data'));
    }
}
