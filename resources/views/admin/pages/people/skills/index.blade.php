@extends('adminlte::page')

@section('title', "Habilidades {$person->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.skills', $person->id) }}">Habilidades</a></li>
    </ol>
    <h1>Habilidades {{$person->name}}
        <a href="{{ route('people.skills.available', $person->id ) }}" class="btn btn-dark">ADD NOVA HABILIDADE
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
                    @foreach($skills as $skill)
                        <tr>
                            <td>
                                {{ $skill->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('person.skill.detach', [$person->id, $skill->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $skills->appends($filters)->links() !!}
            @else
                {!! $skills->links() !!}
            @endif
        </div>
    </div>
@stop
