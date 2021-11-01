@include('admin.includes.alerts')

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $person->name ?? old('name') }}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="lastname">Sobrenome:</label>
            <input type="text" name="lastname" class="form-control" placeholder="Sobrenome" value="{{ $person->lastname ?? old('lastname') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="birth_date">Aniversário:</label>
            <input type="date" name="birth_date" class="form-control" placeholder="Data de Nascimento" value="{{ $person->birth_date ?? old('birth_date') }}">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="gender">Sexo:</label>
            <select name="gender" class="form-control">
                <option value="male" @if (isset($person) && $person->gender) selected @endif > Masculino</option>
                <option value="female" @if (isset($person) && $person->gender) selected @endif >Feminino</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <label for="civil_status">Estado Civil:</label>
        <select name="civil_status" class="form-control">
            <option value="">Selecione...</option>
            <option value="single" @if (isset($person) && $person->civil_status) selected @endif >Solteiro(a)</option>
            <option value="married" @if (isset($person) && $person->civil_status) selected @endif >Casado(a)</option>
            <option value="widowed" @if (isset($person) && $person->civil_status) selected @endif >Viúvo(a)</option>
            <option value="divorced" @if (isset($person) && $person->civil_status) selected @endif >Divorciado(a)</option>
            <option value="other" @if (isset($person) && $person->civil_status) selected @endif >Outro</option>
        </select>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="active">Ativo?</label>
            <select name="active" class="form-control">
                <option value="Y" @if (isset($person) && $person->active) selected @endif >Sim</option>
                <option value="N" @if (isset($person) && $person->active) selected @endif >Não</option>
            </select>
        </div>
    </div>
</div>
<hr>
<h5><i class="fas fa-mobile-alt"></i> Contatos</h5>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Telefone" value="{{ $person->phone ?? old('phone') }}">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="cellphone">Celular:</label>
            <input type="text" name="cellphone" class="form-control" placeholder="Celular" value="{{ $person->cellphone ?? old('cellphone') }}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $person->email ?? old('email') }}">
        </div>
    </div>
</div>
<hr>
<h5><i class="fas fa-map-marker-alt"></i> Endereço</h5>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="postal_code">CEP:</label>
            <input type="text" name="postal_code" class="form-control" placeholder="CEP" value="{{ $person->postal_code ?? old('postal_code') }}">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="street">Rua:</label>
            <input type="text" name="street" class="form-control" placeholder="Rua" value="{{ $person->street ?? old('street') }}">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="house_number">Número:</label>
            <input type="text" name="house_number" class="form-control" placeholder="Número" value="{{ $person->house_number ?? old('house_number') }}">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="district">Bairro:</label>
            <input type="text" name="district" class="form-control" placeholder="Bairro" value="{{ $person->district ?? old('district') }}">
        </div>
    </div>
</div>
<div class="row">    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" name="city" class="form-control" placeholder="Cidade" value="{{ $person->city ?? old('city') }}">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="state">Estado:</label>
            <select name="state" class="form-control">
                <option value="">Selecione...</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="country">País:</label>
            <select name="country" class="form-control">
                <option value="Brazil">Brasil</option>
            </select>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <a href="{{ route('people.index') }}">
        <button type="button" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </a>
    <button type="submit" class="btn btn-success" style="margin: 0 15px;">
        <i class="fas fa-check"></i> Salvar
    </button>
</div>