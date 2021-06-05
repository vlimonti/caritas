@extends('adminlte::page')

@section('title', "Detalhes da cesta {$basket->name}")

@section('content_header')
    <h1>Detalhes da cesta <b>{{ $basket->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $basket->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $basket->description }}
                </li>
            </ul>
            <hr>
            <h5> <i class="fas fa-utensils"></i> Itens da cesta:</h5>
                <ul>
                    @foreach ($products as $product)
                    <li>
                        {{ $product->name }}
                    </li>
                    @endforeach
                </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('baskets.destroy', $basket->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $basket->name }}</button>
            </form>
        </div>
    </div>
@stop