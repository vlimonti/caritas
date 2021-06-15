@extends('adminlte::page')

@section('title', "Editar família {$family->name}")

@section('content_header')
    <h1>Editar família {{ $family->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('families.update', $family->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.pages.families._partials.form')
            </form> 
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
