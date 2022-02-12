<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithForm;
use App\Http\Livewire\Traits\WithFlashMessages;

class GenderForm extends Component
{
    use WithForm, WithFlashMessages;
    
    public $title = 'Gênero';
    public $icon = 'mdi mdi-contacts';
    public $previousRoute = 'gender.list';
    public $method = 'store';
    public $basePath = 'gender.list';

    protected $repositoryClass = 'App\Repositories\GenderRepository';

    protected $inputs = [
        ['field' => 'recordId', 'edit' => true],
        ['field' => 'name', 'edit' => true],
        ['field' => 'description', 'edit' => true],
    ];

    public $name;
    public $description;

    protected $validationAttributes = [
        'name' => 'Nome',
        'description' => 'Descrição',
    ];

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:5000'],
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
                $this->description = $data->description;
            }
        }
    }

    public function render()
    {
        return view('livewire.gender-form');
    }
}
