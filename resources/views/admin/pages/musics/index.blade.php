@extends('adminlte::page')

@section('title', 'Músicas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('musics.index') }}">Músicas</a></li>
    </ol>
    <h1>Músicas <a href="{{ route('musics.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus"></i></a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('musics.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($musics as $music)
                        <tr>
                            <td>
                                {{ $music->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('musics.edit', $music->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('musics.show', $music->id) }}" class="btn btn-warning" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('musics.categories', $music->id) }}" class="btn btn-dark" title="Categorias"><i class="fas fa-layer-group"></i></a>
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
