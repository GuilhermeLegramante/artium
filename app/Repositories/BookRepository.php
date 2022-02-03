<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Traits\RepositoryTrait;

class BookRepository
{
    protected $entity;

    public function __construct(Book $model)
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

                if (isset($filters['author'])) {
                    $query->where('author_id', $filters['author']);
                }

                if (isset($filters['publisher'])) {
                    $query->where('publisher_id', $filters['publisher']);
                }

                if (isset($filters['gender'])) {
                    $query->where('gender_id', $filters['gender']);
                }

                                $query->where('user_id', auth()->user());
            })
            ->orderBy($filters['sortBy'], $filters['sortDirection']);
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data): Book
    {
        return $this->entity
            ->create([
                'user_id' => auth()->user()->id,
                'author_id' => $data['author_id'],
                'publisher_id' => $data['publisher_id'],
                'gender_id' => $data['gender_id'],
                'edition' => isset($data['edition']) ? $data['edition'] : null,
                'pages' => isset($data['pages']) ? $data['pages'] : null,
                'firstPublicationYear' => isset($data['firstPublicationYear']) ? $data['firstPublicationYear'] : null,
                'editionYear' => isset($data['editionYear']) ? $data['editionYear'] : null,
                'acquisitionDate' => isset($data['acquisitionDate']) ? $data['acquisitionDate'] : null,
                'note' => isset($data['note']) ? $data['note'] : null,
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['id'])
            ->update([
                'user_id' => auth()->user()->id,
                'author_id' => $data['author_id'],
                'publisher_id' => $data['publisher_id'],
                'gender_id' => $data['gender_id'],
                'edition' => isset($data['edition']) ? $data['edition'] : null,
                'pages' => isset($data['pages']) ? $data['pages'] : null,
                'firstPublicationYear' => isset($data['firstPublicationYear']) ? $data['firstPublicationYear'] : null,
                'editionYear' => isset($data['editionYear']) ? $data['editionYear'] : null,
                'acquisitionDate' => isset($data['acquisitionDate']) ? $data['acquisitionDate'] : null,
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
