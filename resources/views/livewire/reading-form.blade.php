@extends('partials.form-page')

@section('form')
    @livewire('book-select')

    @include('partials.select-modal', [
    'label' => 'Livro',
    'method' => 'bookSelectModal',
    'model' => 'book_id',
    'description' => $bookTitle,
    'modalId' => 'selectBook',
    ])

    @include('partials.input-date',
    ['label' => 'Data de Início',
    'model' => 'startDate',
    'placeholder' => 'Data de Início'
    ])

    @include('partials.input-date',
    ['label' => 'Data de Término',
    'model' => 'endDate',
    'placeholder' => 'Data de Término'
    ])

    @include('partials.input-number',
    ['label' => 'Avaliação',
    'model' => 'assessment',
    'placeholder' => 'De 1 a 5'
    ])

    @include('partials.textarea',
    ['label' => 'Observações',
    'model' => 'note',
    'placeholder' => 'Observações',
    'rows' => 4,
    'maxLength' => 5000,
    ])
@endsection
