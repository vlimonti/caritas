@extends('adminlte::page')

@section('title', "Detalhes: {$team->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Equipes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.show', $team->id) }}">Ver Equipe</a></li>
    </ol>
    <h1>Detalhes: <b>{{ $team->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>               
                <li>
                    <strong>Nome: </strong> {{ $team->name }}
                </li>
                <li>
                    <strong>Responsável: </strong> {{ $team->person_name }}
                </li>
                <li>
                    <strong>Ministério: </strong> {{ $team->ministry->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $team->description }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('teams.destroy', $team->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $team->name }}</button>
            </form>
        </div>
    </div>
@stop