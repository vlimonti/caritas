@extends('adminlte::page')

@section('title', "Editar: {$person->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.edit', $person->id) }}">Editar Pessoa</a></li>
    </ol>
    <h1>Editar: {{ $person->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('people.update', $person->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.people._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
