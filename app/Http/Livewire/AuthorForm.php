<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithForm;
use App\Http\Livewire\Traits\WithFlashMessages;

class AuthorForm extends Component
{
    use WithForm, WithFlashMessages;

    public $pageTitle = 'Autor';
    public $icon = 'mdi mdi-account-multiple';
    public $previousRoute = 'author.list';
    public $method = 'store';
    public $basePath = 'author.list';

    protected $repositoryClass = 'App\Repositories\AuthorRepository';

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
            $data = $repository->findById($id);
            if (isset($data)) {
                $this->recordId = $data->id;
                $this->name = $data->name;
            }
        }
    }

    public function render()
    {
        return view('livewire.author-form');
    }

    
}
