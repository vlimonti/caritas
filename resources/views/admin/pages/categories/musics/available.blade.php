@extends('adminlte::page')

@section('title', "Músicas disponíveis para categoria {$category->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.musics', $category->id) }}">Músicas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.musics.available', $category->id) }}">Músicas Disponíveis</a></li>
    </ol>
    <h1>Músicas disponíveis para categoria {{ $category->name }} 
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.musics.available', $category->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action=" {{ route('categories.musics.attach', $category->id) }}" method="POST" class="form">
                        @csrf

                        @foreach($musics as $music)
                            <tr>
                                <td>
                                    <input type="checkbox" name="musics[]" value="{{ $music->id }}">
                                </td>
                                <td>
                                    {{ $music->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">

                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $musics->appends($filters)->links() !!}
            @else
                {!! $musics->links() !!}
            @endif
        </div>
    </div>
@stop
