<?php

namespace App\Http\Livewire;

use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class AuthorForm extends Component
{
    public $entityName = 'Autor';
    public $title = 'Novo Autor';
    public $icon = 'mdi mdi-plus';
    public $previousRoute = 'authors';
    public $method = 'store';

    public $name;

    protected $validationAttributes = [
        'name' => 'Nome',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

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
        }
    }

    public function render()
    {
        return view('livewire.author-form');
    }

    public function redirectToPreviousRoute()
    {
        return redirect()->route($this->previousRoute);
    }

    public function store()
    {
        $this->validate();
        try
        {
            $repository = App::make(AuthorRepository::class);
            $repository->create([
                'asdasd' => $this->name,
            ]);
        } catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function update()
    {
        dd('update');
    }

    public function destroy()
    {
        dd('destroy');
    }
}
