@extends('adminlte::page')

@section('title', 'Cadastrar novo ministério')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('ministries.index') }}">Ministérios</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ministries.create') }}">Add Ministério</a></li>
    </ol>
    <h1>Cadastrar novo ministério</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ministries.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.ministries._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
