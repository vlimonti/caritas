@include('admin.includes.alerts')

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $music->name ?? old('name') }}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" name="author" class="form-control" placeholder="Autor" value="{{ $music->author ?? old('author') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="tone">Tonalidade:</label>
            <select name="tone" class="form-control">
                <option value="A"  @if (isset($music->tone) && $music->tone == 'A') selected @endif >A</option>
                <option value="Bb" @if (isset($music->tone) && $music->tone == 'Bb') selected @endif>Bb</option>
                <option value="B"  @if (isset($music->tone) && $music->tone == 'B') selected @endif >B</option>
                <option value="C"  @if (isset($music->tone) && $music->tone == 'C') selected @endif >C</option>
                <option value="Db" @if (isset($music->tone) && $music->tone == 'Db') selected @endif>Db</option>
                <option value="D"  @if (isset($music->tone) && $music->tone == 'D') selected @endif >D</option>
                <option value="Eb" @if (isset($music->tone) && $music->tone == 'Eb') selected @endif>Eb</option>
                <option value="E"  @if (isset($music->tone) && $music->tone == 'E') selected @endif >E</option>
                <option value="F"  @if (isset($music->tone) && $music->tone == 'F') selected @endif >F</option>
                <option value="F#" @if (isset($music->tone) && $music->tone == 'F#') selected @endif>F#</option>
                <option value="G"  @if (isset($music->tone) && $music->tone == 'G') selected @endif >G</option>
                <option value="Ab" @if (isset($music->tone) && $music->tone == 'Ab') selected @endif>Ab</option>
            </select>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="form-group">
            <label for="archive">Cifra/Partitura:</label>
            <input type="file" name="archive" class="form-control">
            @if (isset($music->archive))
            <a href="{{ url("storage/{$music->archive}") }}" target="_blank"><i class="fas fa-eye"></i> Ver Cifra/Partitura</a>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label for="music_link">Link da música:</label>
    <input type="text" name="music_link" class="form-control" placeholder="Link da música" value="{{ $music->music_link ?? old('music_link') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control" ols="20" rows="5" placeholder="Descrição">{{ $music->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <a href="{{ route('musics.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>