@extends('adminlte::page')

@section('title', 'Cadastrar nova pessoa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Pessoas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('people.create') }}">Add Pessoa</a></li>
    </ol>
    <h1>Cadastrar nova pessoa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('people.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.people._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
