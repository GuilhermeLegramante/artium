<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSelect;
use Livewire\Component;

class PublisherSelect extends Component
{
    use WithSelect;

    public $title = 'EDITORAS';
    public $modalId = 'modal-select-publisher';
    public $spanId = 'spanClosePublisher';
    public $searchFields = 'Nome';

    public $closeModal = 'closePublisherModal';
    public $selectModal = 'selectPublisher';
    public $showModal = 'showPublisherModal';

    protected $repositoryClass = 'App\Repositories\PublisherRepository';

    public function render()
    {
        $this->search();

        $data = $this->data;

        return view('livewire.publisher-select', compact('data'));
    }
}
