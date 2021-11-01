@extends('adminlte::page')

@section('title', 'Habilidades')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active"><a href="{{ route('skills.index') }}">Habilidades</a></li>
    </ol>
    <h1>Habilidades <a href="{{ route('skills.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('skills.search') }}" method="POST" class="form form-inline">
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
                    @foreach($skills as $skill)
                        <tr>
                            <td>
                                {{ $skill->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('skills.show', $skill->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('skills.people', $skill->id) }}" class="btn btn-info" title="Pessoas com essa habilidade"><i class="fas fa-users"></i></a>
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
