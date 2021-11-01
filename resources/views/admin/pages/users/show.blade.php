@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->name}")

@section('content_header')
    <h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $user->name }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $user->email }}
                </li>
                <li>
                    <strong>Empresa: </strong> {{ $user->tenant->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $user->name }}</button>            </form>
        </div>
    </div>
@stop