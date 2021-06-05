@extends('adminlte::page')

@section('title', "Editar cesta {$basket->name}")

@section('content_header')
    <h1>Editar cesta {{ $basket->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('baskets.update', $basket->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.baskets._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
