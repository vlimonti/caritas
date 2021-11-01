@extends('adminlte::page')

@section('title', 'Pessoas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active"><a href="{{ route('people.index') }}">Pessoas</a></li>
    </ol>
    <h1>Pessoas <a href="{{ route('people.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('people.search') }}" method="POST" class="form form-inline">
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
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($people as $person)
                        <tr>
                            <td>
                                {{ $person->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('people.edit', $person->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('people.show', $person->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('people.teams', $person->id) }}" class="btn btn-info" title="Equipes"><i class="fas fa-users"></i></a>
                                <a href="{{ route('people.skills', $person->id) }}" class="btn btn-warning" title="Habilidades"><i class="fas fa-icons"></i></a>
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
