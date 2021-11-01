@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $team->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="ministry">Ministério:</label>
    <select name="ministry" class="form-control">
        @foreach ($ministries as $ministry)
            <option value="{{ $ministry->id }}" @if (isset($team) && $team->ministry_id == $ministry->id) selected @endif >{{ $ministry->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="person">Responsável da Equipe:</label>
    <select name="person" class="form-control">
        <option value="">Selecione...</option>
        @foreach ($people as $person)
            <option value="{{ $person->id }}" @if (isset($team) && $team->person_id == $person->id) selected @endif >{{ $person->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control" ols="20" rows="5" placeholder="Descrição">{{ $team->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <a href="{{ route('teams.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>