<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSelect;
use Livewire\Component;

class BookSelect extends Component
{
    use WithSelect;

    public $title = 'LIVROS';
    public $modalId = 'modal-select-book';
    public $spanId = 'spanCloseBook';
    public $searchFields = 'Título';

    public $closeModal = 'closeBookModal';
    public $selectModal = 'selectBook';
    public $showModal = 'showBookModal';

    protected $repositoryClass = 'App\Repositories\BookRepository';

    public function mount()
    {
        foreach ($this->headerColumns as $key => $value) {
            if ($value['field'] == 'name') {
                $this->headerColumns[$key] = ['field' => 'title', 'label' => 'Título'];
            }
        }

        foreach ($this->bodyColumns as $key => $value) {
            if ($value['field'] == 'name') {
                $this->bodyColumns[$key] = ['field' => 'title', 'type' => 'string'];
            }
        }
    }

    public function render()
    {
        $this->search();

        $data = $this->data;

        return view('livewire.book-select', compact('data'));
    }

}
