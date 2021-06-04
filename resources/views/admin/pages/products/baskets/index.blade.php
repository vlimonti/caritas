@extends('adminlte::page')

@section('title', "Cestas com o produto {$product->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.baskets', $product->id) }}">Cestas</a></li>
    </ol>
    <h1>Cestas com o produto {{ $product->name }} 
        <a href="{{ route('products.baskets.available', $product->id ) }}" class="btn btn-dark">ADD NOVA CESTA
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
                    @foreach($baskets as $basket)
                        <tr>
                            <td>
                                {{ $basket->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('product.basket.detach', [$product->id, $basket->id]) }}" class="btn btn-danger">Desvincular</a>
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
