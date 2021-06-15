@extends('adminlte::page')

@section('title', 'Cadastrar Nova Família')

@section('content_header')
    <h1>Cadastrar Nova Família</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('families.store') }}" class="form" method="post">
                @csrf
                
                @include('admin.pages.families._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
