<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\WithForm;
use App\Http\Livewire\Traits\WithFlashMessages;
use App\Repositories\AuthorRepository;

class BookForm extends Component
{
    use WithForm, WithFlashMessages;

    public $title = 'Livro';
    public $icon = 'mdi mdi-library-books';
    public $previousRoute = 'book.list';
    public $method = 'store';
    public $basePath = 'book.list';

    protected $repositoryClass = 'App\Repositories\BookRepository';

    public $name;
    public $author_id;
    public $authorName;

    protected $inputs = [
        ['field' => 'recordId', 'edit' => true],
        ['field' => 'name', 'edit' => true],
        ['field' => 'author_id', 'edit' => true],
    ];

    protected $listeners = [
        'selectAuthor',
    ];
    
    public function selectAuthor($id)
    {
        $repository = App::make(AuthorRepository::class);
        $author = $repository->findById($id);
        $this->author_id = $author->id;
        $this->authorName = $author->name;
    }

    protected $validationAttributes = [
        'name' => 'Nome',
        'author_id' => 'Author',
    ];

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'author_id' => ['required'],
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
                $this->author_id = $data->author_id;
            }
        }
    }
    public function render()
    {
        return view('livewire.book-form');
    }
}
