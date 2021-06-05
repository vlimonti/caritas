@extends('adminlte::page')

@section('title', 'Cestas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('baskets.index') }}">Cestas</a></li>
    </ol>
    <h1>Cestas <a href="{{ route('baskets.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('baskets.search') }}" method="POST" class="form form-inline">
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
                    @foreach($baskets as $basket)
                        <tr>
                            <td>
                                {{ $basket->name }}
                            </td>
                            <td>
                                {{ $basket->description }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('baskets.products', $basket->id) }}" class="btn btn-warning" title="Produtos"><i class="fas fa-utensils"></i></a>
                                <a href="{{ route('baskets.edit', $basket->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('baskets.show', $basket->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $baskets->appends($filters)->links() !!}
            @else
                {!! $baskets->links() !!}
            @endif
        </div>
    </div>
@stop
