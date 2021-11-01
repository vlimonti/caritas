@extends('adminlte::page')

@section('title', "Editar equipe {$team->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Equipes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.edit', $team->id) }}">Editar Equipe</a></li>
    </ol>
    <h1>Editar equipe {{ $team->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('teams.update', $team->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.teams._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
