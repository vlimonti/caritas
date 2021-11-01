@extends('adminlte::page')

@section('title', "Categorias com a música {$music->name } ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('musics.index') }}">Músicas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('musics.categories', $music->id) }}">Categorias</a></li>
    </ol>
    <h1>Categorias com a música {{ $music->name }} 
        <a href="{{ route('musics.categories.available', $music->id ) }}" class="btn btn-dark">ADD NOVA CATEGORIA
            <i class="fas fa-plus"></i>
        </a>
    </h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width=50>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('music.category.detach', [$music->id, $category->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop
