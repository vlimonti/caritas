@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="password">Senha:</label>
    <input type="password" name="password" class="form-control" placeholder="Senha">
</div>
<div class="form-group">
    <a href="{{ route('users.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>