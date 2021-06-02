@extends('adminlte::page')

@section('title', "Detalhes da função { $role->name }")

@section('content_header')
    <h1>Detalhes da função <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $role->description }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('roles.destroy', $role->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar função {{ $role->name }}</button>
            </form>
        </div>
    </div>
@stop