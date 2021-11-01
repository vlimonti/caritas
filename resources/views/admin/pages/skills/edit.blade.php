@extends('adminlte::page')

@section('title', "Editar: {$skill->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">Habilidades</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('skills.edit', $skill->id) }}">Editar Habilidade</a></li>
    </ol>
    <h1>Editar: {{ $skill->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('skills.update', $skill->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.skills._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
