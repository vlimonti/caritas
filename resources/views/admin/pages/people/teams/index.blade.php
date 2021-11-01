@extends('adminlte::page')

@section('title', "Equipes da pessoa")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.teams', $person->id) }}">Equipes</a></li>
    </ol>
    <h1>Equipes da pessoa
        <a href="{{ route('people.teams.available', $person->id ) }}" class="btn btn-dark">ADD NOVA EQUIPE
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
                    @foreach($teams as $team)
                        <tr>
                            <td>
                                {{ $team->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('person.team.detach', [$person->id, $team->id]) }}" class="btn btn-danger">Desvincular</a>
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
