@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $ministry->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="person">Responsável do ministério:</label>
    <select name="person" class="form-control">
        <option value="">Selecione...</option>
        @foreach ($people as $person)
            <option value="{{ $person->id }}" @if (isset($ministry) && $ministry->person_id == $person->id) selected @endif >{{ $person->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control" ols="20" rows="5" placeholder="Descrição">{{ $ministry->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <a href="{{ route('ministries.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>