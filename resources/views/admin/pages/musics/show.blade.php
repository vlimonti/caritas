@extends('adminlte::page')

@section('title', "Detalhes da música {$music->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('musics.index') }}">Músicas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('musics.show', $music->id) }}">Ver Música</a></li>
    </ol>
    <h1>Detalhes da música <b>{{ $music->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>               
                <li>
                    <strong>Nome: </strong> {{ $music->name }}
                </li>
                <li>
                    <strong>Autor: </strong> {{ $music->author }}
                </li>
                <li>
                    <strong>Tom: </strong> {{ $music->tone }}
                </li>
                <li>
                    <strong>Categorias: </strong>
                    <ul>
                        @foreach ($categories as $category)
                        <li>
                            {{ $category->name }}
                        </li>
                        @endforeach
                    </ul>
                </li>
                @if (isset($music->archive))
                    <li>
                        <strong>Cifra/Partitura: </strong>
                        <a href="{{ url("storage/{$music->archive}") }}" target="_blank"><i class="fas fa-eye"></i> Ver</a>
                    </li>
                @endif
                @if (isset($music->musicLink))
                    <li>
                        <strong>Áudio: </strong>
                        <a href="{{$music->musicLink}}" target="_blank"><i class="fas fa-play"></i> Ouvir</a>
                    </li>
                @endif
                <li>
                    <strong>Descrição: </strong> 
                    <textarea class="form-control" ols="20" rows="5">{{ $music->description }}</textarea>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            @include('admin.includes.alerts')
            
            <form action="{{ route('musics.destroy', $music->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Deletar {{ $music->name }}</button>
            </form>
        </div>
    </div>
@stop