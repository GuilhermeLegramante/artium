<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    protected $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $filters = [
            'sortBy' => 'name',
            'sortDirection' => 'asc',
        ];

        dd($this->repository->all($filters)->get());
        return view('authors');
    }
}
