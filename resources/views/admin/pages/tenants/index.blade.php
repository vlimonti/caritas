@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Empresas</a></li>
    </ol>
    <h1>Empresas</h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
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
                        <th>Descrição</th>
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                        <tr>
                            <td>
                                {{ $tenant->name }}
                            </td>
                            <td>
                                {{ $tenant->description }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
@stop
