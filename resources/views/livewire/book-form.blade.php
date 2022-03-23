@extends('partials.form-page')

@section('form')
    @livewire('author-select')

    @include('partials.input-text', [
        'label' => 'Título',
        'model' => 'title',
        'placeholder' => 'Título',
    ])

    @include('partials.select-modal', [
        'label' => 'Autor',
        'method' => 'authorSelectModal',
        'model' => 'author_id',
        'description' => $authorName,
        'modalId' => 'selectAuthor',
    ])

    @livewire('publisher-select')

    @include('partials.select-modal', [
        'label' => 'Editora',
        'method' => 'publisherSelectModal',
        'model' => 'publisher_id',
        'description' => $publisherName,
        'modalId' => 'selectPublisher',
    ])

    @include('partials.select', [
        'columnSize' => 12,
        'label' => 'Gênero',
        'model' => 'gender_id',
        'options' => $genders,
        'disabled' => $method == 'update',
    ])

    @include('partials.input-number', [
        'label' => 'Edição',
        'model' => 'edition',
        'placeholder' => 'Número da Edição',
    ])

    @include('partials.input-number', [
        'label' => 'Páginas',
        'model' => 'pages',
        'placeholder' => 'Número de Páginas',
    ])

    @include('partials.input-number', [
        'label' => '1ª Publicação',
        'model' => 'firstPublicationYear',
        'placeholder' => 'Ano da 1ª publicação',
    ])

    @include('partials.input-number', [
        'label' => 'Ano da Edição',
        'model' => 'editionYear',
        'placeholder' => 'Ano da Edição',
    ])

    @include('partials.input-date', [
        'label' => 'Data de Aquisição',
        'model' => 'acquisitionDate',
        'placeholder' => 'Data de Aquisição',
    ])

    @include('partials.input-text', [
        'label' => 'Origem',
        'model' => 'source',
        'placeholder' => 'Origem',
    ])

    @include('partials.textarea', [
        'label' => 'Observações',
        'model' => 'note',
        'placeholder' => 'Observações',
        'rows' => 4,
        'maxLength' => 5000,
    ])
@endsection
