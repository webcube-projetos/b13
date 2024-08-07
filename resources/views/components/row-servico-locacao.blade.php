<div class="row linha-add mt-3 position-relative align-items-center">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6 mb-4">
            <h5>Locação</h5>
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
        <div class="col-md-3 mb-3">
            <label for="quantidade">Qtd. Dias</label>
            <input type="text" class="form-control" name="quantidade[]" id="quantidade" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantidade">Qtd. Veículos</label>
            <input type="text" class="form-control" name="quantidade[]" id="quantidade" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="idioma">Idioma Motorista</label>
            <select name="idioma[]" id="idioma"  class="form-control">
                <option value="" selected disabled>Idioma</option>
                <option value="">Inglês</option>
                <option value="">Espanhol</option>
            </select>
        </div>
        <div class="col-md-5 mb-3">
            <label for="servico">Serviço</label>
            <livewire:select-component type="services" placeholder="Selecione o serviço" name="service[]" selected='' />

        </div>
        <div class="col-md-5 mb-3">
            <label for="categoriaVeiculo">Categoria de veículo</label>
            <livewire:select-component type="vehiclesCategory" placeholder="Selecione a categoria" name="vehiclesCategory[]" selected='' />
        </div>
        <div class="col-md-2 mb-3">
            <label for="tipoVeiculo">Tipo veículo</label>
            <livewire:select-component type="typesVehicle" placeholder="Selecione" name="typesVehicle[]" selected='' />
        </div>
        <div class="col-md-6 mb-3">
            <label for="modeloVeiculo">Modelo de veículo</label>
            <livewire:select-component type="selectBrand" placeholder="Veiculos" name="selectBrand[]" selected='' />
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-check align-items-center">
                <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1" checked="">
                <label class="custom-control-label" for="customCheck1">Similar</label>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="blindado">Blindado</label>
                <livewire:select-component type="armored" placeholder="" name="armored[]" selected='' />
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="precoBase">Preço franquia</label>
            <input type="number" class="form-control" name="precoBase[]" id="precoBase" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="horaBase">Hora franquia</label>
            <input type="number" class="form-control" name="horaBase[]" id="horaBase" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="horaExtra">Hora extra</label>
            <input type="number" class="form-control" name="horaExtra[]" id="horaExtra" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="kmBase">KM franquia</label>
            <input type="number" class="form-control" name="kmBase[]" id="kmBase" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="kmExtra">KM extra</label>
            <input type="number" class="form-control" name="kmExtra[]" id="kmExtra" required>
        </div>

        <div class="col-md-2 mb-3">
            <label for="custoParceiro">Custo Parceiro</label>
            <input type="number" class="form-control" name="custoParceiro[]" id="custoParceiro" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="extraParceiro">Hora Extra parceiro</label>
            <input type="number" class="form-control" name="extraParceiro[]" id="extraParceiro" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="kmExtraParceiro">Km Extra Parceiro</label>
            <input type="number" class="form-control" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="custoMotorista">Custo Motorista</label>
            <input type="number" class="form-control" name="custoMotorista[]" id="custoMotorista" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="horaExtraMotorista">Custo Extra Motorista</label>
            <input type="number" class="form-control" name="horaExtraMotorista[]" id="horaExtraMotorista" required>
        </div>
        <div class="col-12 text-end mt-3">
            <h3>Total: <span id="total-linha">0,00</span></h3>
        </div>
    </div>
</div>