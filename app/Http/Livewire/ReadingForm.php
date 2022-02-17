<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithForm;
use App\Http\Livewire\Traits\SelectBook;
use App\Http\Livewire\Traits\WithFlashMessages;

class ReadingForm extends Component
{
    use SelectBook, WithForm, WithFlashMessages;

    public $pageTitle = 'Leitura';
    public $icon = 'mdi mdi-book-open-page-variant';
    public $previousRoute = 'reading.list';
    public $method = 'store';
    public $basePath = 'reading.list';

    protected $repositoryClass = 'App\Repositories\ReadingRepository';

    public $startDate;
    public $endDate;
    public $note;
    public $assessment;

    protected $inputs = [
        ['field' => 'recordId', 'edit' => true],
        ['field' => 'book_id', 'edit' => true],
        ['field' => 'startDate', 'edit' => true],
        ['field' => 'endDate', 'edit' => true],
        ['field' => 'assessment', 'edit' => true],
        ['field' => 'note', 'edit' => true],
    ];

    protected $listeners = [
        'selectBook',
    ];

    protected $validationAttributes = [
        'book_id' => 'Livro',
        'startDate' => 'Data de Início',
        'endDate' => 'Data de Término',
        'assessment' => 'Avaliação',
        'note' => 'Observações',
    ];

    public function rules()
    {
        return [
            'book_id' => ['required'],
            'startDate' => ['required', 'date'],
            'endDate' => ['date', 'nullable', 'after:startDate'],
            'assessment' => ['numeric', 'min:1', 'max:5'],
        ];
    }

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->method = 'update';
            $repository = App::make($this->repositoryClass);
            $data = $repository->findById($id);
            if (isset($data)) {
                $this->setFields($data);
            }
        }
    }

    public function setFields($data)
    {
        $this->book_id = $data->book->id;
        $this->bookTitle = $data->book->title;
        $this->startDate = $data->startDate;
        $this->endDate = $data->endDate;
        $this->assessment = $data->assessment;
        $this->note = $data->note;
    }


    public function render()
    {
        return view('livewire.reading-form');
    }
}
