@extends('adminlte::page')

@section('title', "Cestas disponíveis para adicionar {$product->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.baskets', $product->id) }}">Cestas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.baskets.available', $product->id) }}">Cestas Disponíveis</a></li>
    </ol>
    <h1>Cestas disponíveis para adicionar {{ $product->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.baskets.available', $product->id) }}" method="POST" class="form form-inline">
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
                    <form action=" {{ route('products.baskets.attach', $product->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($baskets as $basket)
                            <tr>
                                <td>
                                    <input type="checkbox" name="baskets[]" value="{{ $basket->id }}">
                                </td>
                                <td>
                                    {{ $basket->name }}
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
                {!! $baskets->appends($filters)->links() !!}
            @else
                {!! $baskets->links() !!}
            @endif
        </div>
    </div>
@stop
