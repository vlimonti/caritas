@extends('adminlte::page')

@section('title', "Editar ministério {$ministry->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('ministries.index') }}">Ministérios</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ministries.edit', $ministry->id) }}">Editar Ministério</a></li>
    </ol>
    <h1>Editar ministério {{ $ministry->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ministries.update', $ministry->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.ministries._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
