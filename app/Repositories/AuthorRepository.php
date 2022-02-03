<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    protected $entity;

    public function __construct(Author $model)
    {
        $this->entity = $model;
    }

    public function all(array $filters = [])
    {
        return $this->entity
            ->where(function ($query) use ($filters) {
                if (isset($filters['filter'])) {
                    $filter = $filters['filter'];
                    $query->where('name', 'LIKE', "'%{$filter}%");
                }

                $query->where('user_id', auth()->user());
            })
            ->orderBy($filters['sortBy'], $filters['sortDirection']);
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
