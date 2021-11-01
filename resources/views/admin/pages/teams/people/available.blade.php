@extends('adminlte::page')

@section('title', "Pessoas disponíveis para categoria {$team->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Equipes Ministeriais</a></li>
        <li class="breadcrumb-item"><a href="{{ route('teams.people', $team->id) }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.people.available', $team->id) }}">Pessoas Disponíveis</a></li>
    </ol>
    <h1>Pessoas disponíveis para categoria {{ $team->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('teams.people.available', $team->id) }}" method="POST" class="form form-inline">
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
                    <form action=" {{ route('teams.people.attach', $team->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($people as $person)
                            <tr>
                                <td>
                                    <input type="checkbox" name="people[]" value="{{ $person->id }}">
                                </td>
                                <td>
                                    {{ $person->name }}
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
                {!! $people->appends($filters)->links() !!}
            @else
                {!! $people->links() !!}
            @endif
        </div>
    </div>
@stop
