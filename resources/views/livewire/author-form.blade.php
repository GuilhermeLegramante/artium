@extends('partials.form-page')

@section('form')
    @include('partials.input-text',
    ['label' => 'Nome',
    'model' => 'name',
    'placeholder' => 'Nome completo'
    ])
@endsection
