@extends('adminlte::page')

@section('title', 'Cadastrar nova Música')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('musics.index') }}">Músicas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('musics.create') }}">Add Música</a></li>
    </ol>
    <h1>Cadastrar nova Música</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('musics.store') }}" class="form" method="post" enctype="multipart/form-data">
                @csrf
                
                @include('admin.pages.musics._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
