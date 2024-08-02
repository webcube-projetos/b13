<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="servicos-tab" data-bs-toggle="tab" data-bs-target="#servicos" type="button" role="tab" aria-controls="servicos" aria-selected="true">Serviços</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="rotas-tab" data-bs-toggle="tab" data-bs-target="#rotas" type="button" role="tab" aria-controls="rotas" aria-selected="false">Execução</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="precos-tab" data-bs-toggle="tab" data-bs-target="#precos" type="button" role="tab" aria-controls="precos" aria-selected="false">Preços</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="fechamento-tab" data-bs-toggle="tab" data-bs-target="#fechamento" type="button" role="tab" aria-controls="fechamento" aria-selected="false">Fechamento</button>
        </li>
    </ul>
    <div class="tab-content mb-4" id="myTabContent">
        <div class="tab-pane fade show active" id="servicos" role="tabpanel" aria-labelledby="servicos-tab">
            <div class="row linha-add position-relative">
                <div class="col-md-1 mb-3">
                    <label for="quantidade">Qtd. Dias</label>
                    <input type="text" class="form-control" name="quantidade[]" id="quantidade" required>
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
                    <label for="servico">Serviço</label>
                    <livewire:select-component type="services" placeholder="Selecione o serviço" name="service" selected='' />
    
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tipoVeiculo">Tipo veículo</label>
                    <select name="tipoVeiculo[]" id="tipoVeiculo"  class="form-control">
                        <option value="">SUV</option>
                        <option value="">Sedan</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="blindado">Blindado</label>
                    <select name="blindado[]" id="blindado"  class="form-control">
                        <option value="">Sim</option>
                        <option value="">Não</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="rotas" role="tabpanel" aria-labelledby="rotas-tab">
            <div class="row linha-add position-relative">
                <div class="col-md-2 mb-3">
                    <label for="execucacao">Data de execução</label>
                    <input type="date" class="form-control" name="execucacao[]" id="execucacao" maxlength="30" required>
                </div>
                <div class="col-md-4 offset-md-8 mb-3">
                    <a href="javascript:;" id="addLinhaRota" class="btn bg-gradient-dark btn-md mt-4 mb-4">+ Adicionar rota</a>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="modeloVeiculo">Modelo de veículo</label>
                    <select name="modeloVeiculo[]" id="modeloVeiculo"  class="form-control">
                        <option value="">Toyota Etios</option>
                        <option value="">Jeep Renegade</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="company">Empresa</label>
                    <select name="company[]" id="company"  class="form-control">
                        <option value="">B13 Company</option>
                        <option value="">ABC Transportes</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="motoristaVeiculo">Motorista</label>
                    <select name="motoristaVeiculo[]" id="motoristaVeiculo"  class="form-control">
                        <option value="">Jorge Lucas</option>
                        <option value="">Antonio Juarez</option>
                    </select>
                </div>
                
    
                <div class="col-md-2 mb-3">
                    <label for="horarioInicio">Horário Início</label>
                    <input type="number" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="horarioTermino">Horário Término</label>
                    <input type="number" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="kmInicio">Km Início</label>
                    <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="kmTermino">KM Término</label>
                    <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pedagio">Pedágio</label>
                    <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="estacionamento">Estacionamento</label>
                    <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                </div>
                
                <div class="col-12 box-rota" id="box-linhas-rota">
                    
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="precos" role="tabpanel" aria-labelledby="precos-tab">
            <div class="row linha-add position-relative">
                <div class="col-md-3 mb-3">
                    <label for="precoBase">Valor</label>
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
            </div>
        </div>
      </div>
    </div>
 </div>
