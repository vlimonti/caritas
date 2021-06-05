@extends('adminlte::page')

@section('title', "Produtos da cesta {$basket->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('baskets.index') }}">Cestas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('baskets.products', $basket->id) }}">Produtos</a></li>
    </ol>
    <h1>Produtos da cesta {{ $basket->name }} 
        <a href="{{ route('baskets.products.available', $basket->id ) }}" class="btn btn-dark">ADD NOVO PRODUTO
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
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('basket.product.detach', [$basket->id, $product->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
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
