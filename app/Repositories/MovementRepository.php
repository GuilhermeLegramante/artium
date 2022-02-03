<?php

namespace App\Repositories;

use App\Models\Movement;
use App\Repositories\Traits\RepositoryTrait;

class MovementRepository
{
    protected $entity;

    public function __construct(Movement $model)
    {
        $this->entity = $model;
    }

    public function all(array $filters = [])
    {
        return $this->entity
            ->where(function ($query) use ($filters) {
                if (isset($filters['book'])) {
                    $query->where('book_id', $filters['book']);
                }

                if (isset($filters['type'])) {
                    $query->where('type', $filters['type']);
                }

                                $query->where('user_id', auth()->user());
            })
            ->orderBy($filters['sortBy'], $filters['sortDirection']);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Movement
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'date' => $data['date'],
                'type' => $data['type'],
                'note' => isset($data['note']) ? $data['note'] : null,
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->update([
                'user_id' => auth()->user()->id,
                'date' => $data['date'],
                'type' => $data['type'],
                'note' => isset($data['note']) ? $data['note'] : null,
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->delete();
    }
}
