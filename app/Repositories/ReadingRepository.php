<?php

namespace App\Repositories;

use App\Models\Reading;

class ReadingRepository
{
    protected $entity;

    public function __construct(Reading $model)
    {
        $this->entity = $model;
    }

    public function all(string $search = null, $sortBy = 'id', $sortDirection = 'asc')
    {
        $data = $this->entity
            ->where('user_id', '=', auth()->user()->id)
            ->where('id', 'LIKE', '%' . $search . '%')
            ->orderBy($sortBy, $sortDirection);

        if (count($data->get()) == 0) {
            $data = $this->entity->whereHas('book', function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%');
            });
        }

        return $data;
    }

    public function findById(string $id)
    {
        return $this->entity->with('book')->findOrFail($id);
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
            ->where('id', $data['recordId'])
            ->update([
                'user_id' => auth()->user()->id,
                'book_id' => $data['book_id'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
                'assessment' => isset($data['assessment']) ? $data['assessment'] : null,
                'note' => isset($data['note']) ? $data['note'] : null,
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['recordId'])
            ->delete();
    }
}
