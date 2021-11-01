@extends('adminlte::page')

@section('title', 'Equipes')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.index') }}">Equipes</a></li>
    </ol>
    <h1>Equipes <a href="{{ route('teams.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('teams.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Responsável</th>
                        <th>Ministério</th>
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>
                                {{ $team->name }}
                            </td>
                            <td>
                                {{ $team->person_name }}
                            </td>
                            <td>
                                {{ $team->ministry->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('teams.show', $team->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('teams.people', $team->id) }}" class="btn btn-info" title="Pessoas da Equipe"><i class="fas fa-user"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $teams->appends($filters)->links() !!}
            @else
                {!! $teams->links() !!}
            @endif
        </div>
    </div>
@stop
