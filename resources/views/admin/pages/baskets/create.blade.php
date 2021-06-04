@extends('adminlte::page')

@section('title', 'Cadastrar nova cesta')

@section('content_header')
    <h1>Cadastrar nova cesta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('baskets.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.baskets._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
