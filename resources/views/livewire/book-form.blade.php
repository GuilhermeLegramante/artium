@extends('partials.form-page')

@section('form')
    @livewire('author-select')

    @include('partials.input-text',
    ['label' => 'Nome',
    'model' => 'name',
    'placeholder' => 'Nome'
    ])

    @include('partials.select-modal', [
    'label' => 'Autor',
    'method' => 'authorSelectModal',
    'model' => 'author_id',
    'description' => $authorName,
    'disabled' => $method == 'update',
    'modalId' => 'selectAuthor',
    ])


@endsection
