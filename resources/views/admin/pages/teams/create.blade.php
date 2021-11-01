@extends('adminlte::page')

@section('title', 'Cadastrar nova equipe')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Equipes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.create') }}">Add Equipe</a></li>
    </ol>
    <h1>Cadastrar nova equipe</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('teams.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.teams._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
