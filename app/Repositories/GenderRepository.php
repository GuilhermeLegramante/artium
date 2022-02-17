<?php

namespace App\Repositories;

use App\Models\Gender;

class GenderRepository
{
    protected $entity;

    public function __construct(Gender $model)
    {
        $this->entity = $model;
    }

    public function all(string $search = null, $sortBy = 'id', $sortDirection = 'asc')
    {
        return $this->entity
            ->where('user_id', '=', auth()->user()->id)
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('id', 'LIKE', '%' . $search . '%')
            ->orderBy($sortBy, $sortDirection);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Gender
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'description' => isset($data['description']) ? $data['description'] : null,
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['recordId'])
            ->update([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'description' => isset($data['description']) ? $data['description'] : null,
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['recordId'])
            ->delete();
    }
}
