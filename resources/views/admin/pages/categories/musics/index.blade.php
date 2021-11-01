@extends('adminlte::page')

@section('title', "Músicas da categoria {$category->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.musics', $category->id) }}">Músicas</a></li>
    </ol>
    <h1>Músicas da categoria {{ $category->name }} 
        <a href="{{ route('categories.musics.available', $category->id ) }}" class="btn btn-dark">ADD NOVA MÚSICA
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
                    @foreach($musics as $music)
                        <tr>
                            <td>
                                {{ $music->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('category.music.detach', [$category->id, $music->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
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
