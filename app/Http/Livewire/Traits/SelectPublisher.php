<?php

namespace App\Http\Livewire\Traits;

use App\Repositories\PublisherRepository;
use Illuminate\Support\Facades\App;

trait SelectPublisher
{
    public $publisher_id;
    public $publisherName;

    public function selectPublisher($id)
    {
        $repository = App::make(PublisherRepository::class);
        $publisher = $repository->findById($id);
        $this->publisher_id = $publisher->id;
        $this->publisherName = $publisher->name;
        $this->resetValidation('publisher_id');
    }
}
