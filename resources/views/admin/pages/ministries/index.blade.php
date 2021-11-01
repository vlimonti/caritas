@extends('adminlte::page')

@section('title', 'Ministérios')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active"><a href="{{ route('ministries.index') }}">Ministérios</a></li>
    </ol>
    <h1>Ministérios <a href="{{ route('ministries.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('ministries.search') }}" method="POST" class="form form-inline">
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
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ministries as $ministry)
                        <tr>
                            <td>
                                {{ $ministry->name }}
                            </td>
                            <td>
                                {{ $ministry->person_name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('ministries.edit', $ministry->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('ministries.show', $ministry->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $ministries->appends($filters)->links() !!}
            @else
                {!! $ministries->links() !!}
            @endif
        </div>
    </div>
@stop
