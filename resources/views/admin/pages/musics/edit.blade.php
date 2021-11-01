@extends('adminlte::page')

@section('title', "Editar música {$music->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('musics.index') }}">Músicas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('musics.edit', $music->id) }}">Editar Música</a></li>
    </ol>
    <h1>Editar música {{ $music->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('musics.update', $music->id) }}" class="form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('admin.pages.musics._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
