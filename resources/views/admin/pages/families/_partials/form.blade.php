@include('admin.includes.alerts')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="familyName">Nome da Família:</label>
            <input type="text" name="familyName" class="form-control" placeholder="Nome da Família" value="{{ $family->familyName ?? old('familyName') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $family->description ?? old('description') }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="zipCode">CEP:</label>
            <input type="text" name="zipCode" class="form-control" placeholder="CEP" value="{{ $family->zipCode ?? old('zipCode') }}">
        </div>
    </div>
    <div class="col-md-2" style="padding-top: 3.5%;">
        <button class="btn btn-primary" id="btnSearch"><i class="fa fa-search"></i></button>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="street">Rua:</label>
            <input type="text" name="street" class="form-control" placeholder="Rua" value="{{ $family->street ?? old('street') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="number">Número:</label>
            <input type="text" name="number" class="form-control" placeholder="Número" value="{{ $family->number ?? old('number') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="district">Bairro:</label>
            <input type="text" name="district" class="form-control" placeholder="Bairro" value="{{ $family->district ?? old('district') }}">
        </div>
    </div>
    <div class="col-md-6">
        <label for="complement">Complemento:</label>
    <input type="text" name="complement" class="form-control" placeholder="Complemento" value="{{ $family->complement ?? old('complement') }}">
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" name="city" class="form-control" placeholder="Cidade" value="{{ $family->city ?? old('city') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="state">Estado:</label>
            <input type="text" name="state" class="form-control" placeholder="Estado" value="{{ $family->state ?? old('state') }}">
        </div>
    </div>
</div>

<div class="form-group">
   <button type="submit" class="btn btn-success">Salvar</button>
</div>