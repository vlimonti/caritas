@extends('adminlte::page')

@section('title', "Detalhes: {$person->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.show', $person->id) }}">Ver Pessoa</a></li>
    </ol>
    <h1>Detalhes: <b>{{ $person->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>               
                <li>
                    <strong>Nome: </strong> {{ $person->name }}
                </li>
                <li>
                    <strong>Aniversário: </strong> {{ $person->birthday }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('people.destroy', $person->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $person->name }}</button>
            </form>
        </div>
    </div>
@stop