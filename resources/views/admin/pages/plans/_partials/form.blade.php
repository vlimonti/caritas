@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <a href="{{ route('plans.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>