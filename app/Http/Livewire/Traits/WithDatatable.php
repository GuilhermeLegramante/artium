<?php

namespace App\Http\Livewire\Traits;

trait WithDatatable 
{
    public $perPage = 30;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    
    public function sortBy($field)
    {
        $this->sortDirection == 'asc' ? $this->sortDirection = 'desc' : $this->sortDirection = 'asc';
        return $this->sortBy = $field;
    }

    public function callForm($id = null)
    {
        if(isset($id)){
            return redirect()->route($this->route . '.edit', ['id' => $id]);
        } else {
            return redirect()->route($this->route . '.create');
        }
    }
}