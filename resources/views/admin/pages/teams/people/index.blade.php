@extends('adminlte::page')

@section('title', "Pessoas da equipe {$team->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Equipes Ministeriais</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('teams.people', $team->id) }}">Pessoas</a></li>
    </ol>
    <h1>Pessoas da equipe {{ $team->name }} 
        <a href="{{ route('teams.people.available', $team->id ) }}" class="btn btn-dark">ADD NOVA PESSOA
            <i class="fas fa-plus"></i>
        </a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width=50>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($people as $person)
                        <tr>
                            <td>
                                {{ $person->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('team.person.detach', [$team->id, $person->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
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
