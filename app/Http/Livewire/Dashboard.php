<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Reading;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $totalBooks;
    public $totalReadings;
    public $yearReadings;

    public function mount()
    {
        $this->totalBooks = Book::get()->count();
        $this->totalReadings = Reading::get()->count();
        $this->yearReadings = Reading::whereBetween('endDate', [date('Y') . '01-01', date('Y-m-d')])->get()->count();

    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
