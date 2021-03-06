<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $entity;

    public function __construct(Book $model)
    {
        $this->entity = $model;
    }

    public function all(string $search = null, $sortBy = 'id', $sortDirection = 'asc')
    {
        return $this->entity
            ->where('user_id', '=', auth()->user()->id)
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('id', 'LIKE', '%' . $search . '%')
            ->orWhere('gender_id', 'LIKE', '%' . $search . '%')
            ->orderBy($sortBy, $sortDirection);
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
                'title' => $data['title'],
                'author_id' => $data['author_id'],
                'publisher_id' => $data['publisher_id'],
                'gender_id' => $data['gender_id'],
                'edition' => isset($data['edition']) ? $data['edition'] : null,
                'pages' => isset($data['pages']) ? $data['pages'] : null,
                'firstPublicationYear' => isset($data['firstPublicationYear']) ? $data['firstPublicationYear'] : null,
                'editionYear' => isset($data['editionYear']) ? $data['editionYear'] : null,
                'acquisitionDate' => isset($data['acquisitionDate']) ? $data['acquisitionDate'] : null,
                'note' => isset($data['note']) ? $data['note'] : null,
                'source' => isset($data['source']) ? $data['source'] : null,
            ]);
    }

    public function update(array $data): bool
    {
        return $this->entity
            ->where('id', $data['recordId'])
            ->update([
                'user_id' => auth()->user()->id,
                'title' => $data['title'],
                'author_id' => $data['author_id'],
                'publisher_id' => $data['publisher_id'],
                'gender_id' => $data['gender_id'],
                'edition' => isset($data['edition']) ? $data['edition'] : null,
                'pages' => isset($data['pages']) ? $data['pages'] : null,
                'firstPublicationYear' => isset($data['firstPublicationYear']) ? $data['firstPublicationYear'] : null,
                'editionYear' => isset($data['editionYear']) ? $data['editionYear'] : null,
                'acquisitionDate' => isset($data['acquisitionDate']) ? $data['acquisitionDate'] : null,
                'note' => isset($data['note']) ? $data['note'] : null,
                'source' => isset($data['source']) ? $data['source'] : null,
            ]);
    }

    public function delete(array $data): bool
    {
        return $this->entity
            ->where('id', $data['recordId'])
            ->delete();
    }
}
