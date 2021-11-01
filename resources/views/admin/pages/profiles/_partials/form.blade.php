@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $profile->description ?? old('description') }}">
</div>
<div class="form-group">
    <a href="{{ route('profiles.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>