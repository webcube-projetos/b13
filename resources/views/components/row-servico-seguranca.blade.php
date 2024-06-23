<div class="row linha-add mt-3 position-relative">
    <div class="col-md-6 mb-4">
        <h5>Segurança</h5>
    </div>
    <div class="col-md-6 mb-4 text-end">
        <a href="javascript:;" class="button-actions text-secondary font-weight-bold text-xs me-2 clonarLinha">
            <i class="fa fa-clone" aria-hidden="true"></i>
        </a>

        <a href="javascript:;" class="button-actions text-secondary font-weight-bold text-xs me-2 deletarLinha">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-md-2 mb-3">
        <label for="inicio">Início</label>
        <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
    </div>
    <div class="col-md-2 mb-3">
        <label for="termino">Término</label>
        <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="qtdDias">Qtd. Dias</label>
        <input type="text" class="form-control" name="qtdDias[]" id="qtdDias" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="qtdSegurancas">Qtd. Seguranças</label>
        <input type="text" class="form-control" name="qtdSegurancas[]" id="qtdSegurancas" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="servico">Serviço</label>
        <livewire:select-component type="services" placeholder="Selecione o serviço" name="service[]" selected='' />
    </div>
    <div class="col-md-6 mb-3">
        <label for="categoriaVeiculo">Categoria de serviço</label>
        <select name="categoriaVeiculo[]" id="categoriaVeiculo"  class="form-control">
            <option value="">Patrimonial</option>
        </select>
    </div>


    <div class="col-md-4 mb-3">
        <label for="precoBase">Preço franquia</label>
        <input type="number" class="form-control" name="precoBase[]" id="precoBase" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="horaBase">Hora franquia</label>
        <input type="number" class="form-control" name="horaBase[]" id="horaBase" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="horaExtra">Hora extra</label>
        <input type="number" class="form-control" name="horaExtra[]" id="horaExtra" required>
    </div>

    <div class="col-md-3 mb-3">
        <label for="custoParceiro">Custo Parceiro</label>
        <input type="number" class="form-control" name="custoParceiro[]" id="custoParceiro" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="extraParceiro">Hora Extra parceiro</label>
        <input type="number" class="form-control" name="extraParceiro[]" id="extraParceiro" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="custoSeguranca">Custo Segurança</label>
        <input type="number" class="form-control" name="custoSeguranca[]" id="custoSeguranca" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="horaExtraSeguranca">Hora Extra Segurança</label>
        <input type="number" class="form-control" name="horaExtraSeguranca[]" id="horaExtraSeguranca" required>
    </div>
    <div class="col-12 text-end mt-3">
        <h3>Total: <span id="total-linha">0,00</span></h3>
    </div>
</div>