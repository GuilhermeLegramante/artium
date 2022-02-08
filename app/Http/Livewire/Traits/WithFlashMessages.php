<?php

namespace App\Http\Livewire\Traits;

trait WithFlashMessages
{
    public $flashMessages;

    public function resetFlashMessages()
    {
        $this->flashMessages = false;
    }
}
