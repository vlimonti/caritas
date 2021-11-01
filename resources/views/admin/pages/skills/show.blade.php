@extends('adminlte::page')

@section('title', "Detalhes: {$skill->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">Habilidades</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('skills.show', $skill->id) }}">Ver Habilidade</a></li>
    </ol>
    <h1>Detalhes: <b>{{ $skill->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>               
                <li>
                    <strong>Nome: </strong> {{ $skill->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('skills.destroy', $skill->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $skill->name }}</button>
            </form>
        </div>
    </div>
@stop