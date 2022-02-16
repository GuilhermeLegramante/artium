<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\SelectAuthor;
use App\Http\Livewire\Traits\SelectPublisher;
use App\Http\Livewire\Traits\WithFlashMessages;
use App\Http\Livewire\Traits\WithForm;
use App\Repositories\GenderRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class BookForm extends Component
{
    use WithForm, WithFlashMessages, SelectAuthor, SelectPublisher;

    public $pageTitle = 'Livro';
    public $icon = 'mdi mdi-library-books';
    public $previousRoute = 'book.list';
    public $method = 'store';
    public $basePath = 'book.list';

    protected $repositoryClass = 'App\Repositories\BookRepository';

    public $title;
    public $gender_id;
    public $genders = [];
    public $edition;
    public $pages;
    public $firstPublicationYear;
    public $editionYear;
    public $acquisitionDate;
    public $note;

    protected $inputs = [
        ['field' => 'recordId', 'edit' => true],
        ['field' => 'title', 'edit' => true],
        ['field' => 'author_id', 'edit' => true],
        ['field' => 'publisher_id', 'edit' => true],
        ['field' => 'gender_id', 'edit' => true],
        ['field' => 'edition', 'edit' => true],
        ['field' => 'pages', 'edit' => true],
        ['field' => 'firstPublicationYear', 'edit' => true],
        ['field' => 'editionYear', 'edit' => true],
        ['field' => 'acquisitionDate', 'edit' => true],
        ['field' => 'note', 'edit' => true],
    ];

    protected $listeners = [
        'selectAuthor',
        'selectPublisher',
    ];

    protected $validationAttributes = [
        'title' => 'Título',
        'author_id' => 'Autor',
        'publisher_id' => 'Editora',
        'gender_id' => 'Gênero',
        'edition' => 'Edição',
        'pages' => 'Páginas',
        'firstPublicationYear' => 'Ano da 1ª publicação',
        'editionYear' => 'Ano da Edição',
        'acquisitionDate' => 'Data de aquisição',
        'note' => 'Observações',
    ];

    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'author_id' => ['required'],
            'publisher_id' => ['required'],
            'gender_id' => ['required'],
            'edition' => ['numeric', 'nullable'],
            'pages' => ['numeric', 'nullable', 'min:1'],
            'firstPublicationYear' => ['numeric', 'nullable', 'max:' . date('Y')],
            'editionYear' => ['numeric', 'max:' . date('Y'), 'nullable'],
            'acquisitionDate' => ['date', 'nullable'],
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

        $repository = App::make(GenderRepository::class);
        $data = $repository->all()->get();
        $item = [];
        foreach ($data as $key => $value) {
            $item = ['value' => $value->id, 'description' => $value->name];
            array_push($this->genders, $item);
        }
    }

    public function setFields($data)
    {
        $this->selectAuthor($data->author_id);
        $this->selectPublisher($data->publisher_id);
        $this->recordId = $data->id;
        $this->title = $data->title;
        $this->author_id = $data->author_id;
        $this->publisher_id = $data->publisher_id;
        $this->gender_id = $data->gender_id;
        $this->edition = $data->edition;
        $this->pages = $data->pages;
        $this->firstPublicationYear = $data->firstPublicationYear;
        $this->editionYear = $data->editionYear;
        $this->acquisitionDate = $data->acquisitionDate;
        $this->note = $data->note;
    }

    public function render()
    {
        return view('livewire.book-form');
    }
}
