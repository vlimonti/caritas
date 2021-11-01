@extends('adminlte::page')

@section('title', 'Cadastrar nova habilidade')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">Habilidades</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('skills.create') }}">Add Habilidade</a></li>
    </ol>
    <h1>Cadastrar nova habilidade</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('skills.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.skills._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
