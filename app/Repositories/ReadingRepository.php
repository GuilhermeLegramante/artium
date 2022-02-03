<?php

namespace App\Repositories;

use App\Models\Reading;
use App\Repositories\Traits\RepositoryTrait;

class ReadingRepository
{
    use RepositoryTrait, WithFilter;

    protected $entity;

    public function __construct(Reading $model)
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

                if (isset($filters['startDate'])) {
                    $query->where('startDate', '>=', $filters['startDate']);
                }

                if (isset($filters['endDate'])) {
                    $query->where('endDate', '<=', $filters['endDate']);
                }

                if (isset($filters['assessment'])) {
                    $query->where('assessment', $filters['assessment']);
                }

                if (isset($filters['note'])) {
                    $query->where('note', $filters['note']);
                }

                                $query->where('user_id', auth()->user());
            })
            ->orderBy($filters['sortBy'], $filters['sortDirection']);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Reading
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'book_id' => $data['book_id'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
                'note' => isset($data['note']) ? $data['note'] : null,
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->update([
                'user_id' => auth()->user()->id,
                'book_id' => $data['book_id'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
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
