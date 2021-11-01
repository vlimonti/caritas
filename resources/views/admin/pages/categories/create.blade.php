@extends('adminlte::page')

@section('title', 'Cadastrar nova categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Add Categoria</a></li>
    </ol>
    <h1>Cadastrar nova categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.categories._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
