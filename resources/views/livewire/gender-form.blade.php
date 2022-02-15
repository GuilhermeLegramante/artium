@extends('partials.form-page')

@section('form')
    @include('partials.input-text',
    ['label' => 'Nome',
    'model' => 'name',
    'placeholder' => 'Nome'
    ])

    @include('partials.input-text',
    ['label' => 'Descrição',
    'model' => 'description',
    'placeholder' => 'Descrição'
    ])
@endsection
