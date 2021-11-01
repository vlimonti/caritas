@extends('adminlte::page')

@section('title', "Editar categoria {$category->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.edit', $category->id) }}">Editar Categoria</a></li>
    </ol>
    <h1>Editar categoria {{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.categories._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
