@extends('adminlte::page')

@section('title', "Funções disponíveis para o usuário {$user->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id) }}">Funções</a></li>
    </ol>
    <h1>Funções disponíveis para o usuário {{ $user->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.roles.available', $user->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action=" {{ route('users.roles.attach', $user->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">

                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop
