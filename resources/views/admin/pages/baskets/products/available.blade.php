@extends('adminlte::page')

@section('title', "Produtos disponíveis para cesta {$basket->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('baskets.index') }}">Cestas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('baskets.products', $basket->id) }}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('baskets.products.available', $basket->id) }}">Produtos Disponíveis</a></li>
    </ol>
    <h1>Produtos disponíveis para cesta {{ $basket->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('baskets.products.available', $basket->id) }}" method="POST" class="form form-inline">
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
                    <form action=" {{ route('baskets.products.attach', $basket->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <input type="checkbox" name="products[]" value="{{ $product->id }}">
                                </td>
                                <td>
                                    {{ $product->name }}
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
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
@stop
