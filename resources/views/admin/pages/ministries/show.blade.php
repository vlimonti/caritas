@extends('adminlte::page')

@section('title', "Detalhes do ministério {$ministry->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('ministries.index') }}">Ministérios</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ministries.show', $ministry->id) }}">Ver Ministério</a></li>
    </ol>
    <h1>Detalhes do ministério <b>{{ $ministry->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>               
                <li>
                    <strong>Nome: </strong> {{ $ministry->name }}
                </li>
                <li>
                    <strong>Responsável: </strong> {{ $ministry->person_name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $ministry->description }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('ministries.destroy', $ministry->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $ministry->name }}</button>
            </form>
        </div>
    </div>
@stop