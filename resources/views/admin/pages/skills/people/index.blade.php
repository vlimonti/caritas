@extends('adminlte::page')

@section('title', "Pessoas com a habilidade {$skill->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">Habilidades</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('skills.people', $skill->id) }}">Pessoas</a></li>
    </ol>
    <h1>Pessoas com a habilidade {{$skill->name}}
        <a href="{{ route('skills.people.available', $skill->id ) }}" class="btn btn-dark">ADD NOVA PESSOA
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
                                <a href="{{ route('skill.person.detach', [$skill->id, $person->id]) }}" class="btn btn-danger">Desvincular</a>
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
