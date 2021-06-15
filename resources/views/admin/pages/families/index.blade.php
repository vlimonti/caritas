@extends('adminlte::page')

@section('title', 'Famílias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('families.index') }}">Famílias</a></li>
    </ol>
    <h1>Famílias <a href="{{ route('families.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('families.search') }}" method="POST" class="form form-inline">
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
                    @foreach($families as $family)
                        <tr>
                            <td>
                                {{ $family->familyName }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('families.edit', $family->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('families.show', $family->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $families->appends($filters)->links() !!}
            @else
                {!! $families->links() !!}
            @endif
        </div>
    </div>
@stop
