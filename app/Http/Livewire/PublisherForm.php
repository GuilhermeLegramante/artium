<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithForm;
use App\Http\Livewire\Traits\WithFlashMessages;

class PublisherForm extends Component
{
    use WithForm, WithFlashMessages;

    public $title = 'Editora';
    public $icon = 'mdi mdi-contacts';
    public $previousRoute = 'publisher.list';
    public $method = 'store';
    public $basePath = 'publisher.list';

    protected $repositoryClass = 'App\Repositories\PublisherRepository';

    protected $inputs = [
        ['field' => 'recordId', 'edit' => true],
        ['field' => 'name', 'edit' => true],
    ];

    public $name;

    protected $validationAttributes = [
        'name' => 'Nome',
    ];

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
        ];
    }

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->method = 'update';
            $repository = App::make($this->repositoryClass);
            $author = $repository->findById($id);
            if (isset($author)) {
                $this->recordId = $author->id;
                $this->name = $author->name;
            }
        }

    }

    public function render()
    {
        return view('livewire.publisher-form');
    }
}
