@extends('adminlte::page')

@section('title', "Adicionar Habilidade para {$person->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('people.skills', $person->id) }}">Equipes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.skills.available', $person->id) }}">Habilidades Disponíveis</a></li>
    </ol>
    <h1>Adicionar Habilidade para {{ $person->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('people.skills.available', $person->id) }}" method="POST" class="form form-inline">
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
                    <form action=" {{ route('people.skills.attach', $person->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($skills as $skill)
                            <tr>
                                <td>
                                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}">
                                </td>
                                <td>
                                    {{ $skill->name }}
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
                {!! $skills->appends($filters)->links() !!}
            @else
                {!! $skills->links() !!}
            @endif
        </div>
    </div>
@stop
