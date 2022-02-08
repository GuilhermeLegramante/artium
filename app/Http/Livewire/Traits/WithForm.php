<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\App;

trait WithForm
{
    public $recordId;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
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
            $repository = App::make($this->repositoryClass);

            $data = [];
            $array = json_decode(json_encode($this), true);
            foreach ($this->inputs as $value) {
                $data[$value['field']] = $array[$value['field']];
            }
            $repository->create($data);

            session()->flash('success', 'Registro salvo com sucesso');
            return redirect()->route($this->basePath);
        } catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function update()
    {
        $this->validate();
        try
        {
            $repository = App::make($this->repositoryClass);
            $data = [];
            $array = json_decode(json_encode($this), true);
            foreach ($this->inputs as $value) {
                if ($value['edit']) {
                    $data[$value['field']] = $array[$value['field']];
                }
            }
            $repository->update($data);
            session()->flash('success', 'Registro editado com sucesso');
            return redirect()->route($this->basePath);
        } catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function destroy()
    {
        $repository = App::make($this->repositoryClass);
        $repository->delete([
            'id' => $this->recordId,
        ]);
    }
}
