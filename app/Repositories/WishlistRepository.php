<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\Traits\RepositoryTrait;

class WishlistRepository
{
    protected $entity;

    public function __construct(Wishlist $model)
    {
        $this->entity = $model;
    }

    public function all(array $filters = [])
    {
        return $this->entity
            ->where(function ($query) use ($filters) {
                if (isset($filters['filter'])) {
                    $filter = $filters['filter'];
                    $query->where('title', 'LIKE', "'%{$filter}%");
                }

                if (isset($filters['startDate']) && isset($filters['endDate'])) {
                    $query->whereBetween('creationDate', $filters['startDate'], $filters['endDate']);
                }

                                $query->where('user_id', auth()->user());
            })
            ->orderBy($filters['sortBy'], $filters['sortDirection']);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Wishlist
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'title' => $data['title'],
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->update([
                'user_id' => auth()->user()->id,
                'title' => $data['title'],
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->delete();
    }
}
