<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Facades\App;

class AuthorRepository
{
    protected $entity;

    public function __construct()
    {
        $this->entity = App::make(Author::class);
    }

    public function all(string $search = null, $sortBy = 'id', $sortDirection = 'asc')
    {
        return $this->entity
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('id', 'LIKE', '%' . $search . '%')
            ->orderBy($sortBy, $sortDirection);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Author
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->update([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->delete();
    }
}
