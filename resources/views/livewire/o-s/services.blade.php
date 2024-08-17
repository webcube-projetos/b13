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
                <div class="col-md-3 mb-3">
                    <label for="inicio">Início</label>
                    <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="termino">Término</label>
                    <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdDias">Qtd. Dias</label>
                    <input type="number" class="form-control" name="qtdDias[]" id="qtdDias" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdServices">Qtd. Veículos</label>
                    <input type="number" class="form-control" name="qtdServices[]" id="qtdServices" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="bilingue">Bilíngue</label>
                    <select name="bilingue[]" id="bilingue"  class="form-control">
                        <option value="">Sim</option>
                        <option value="">Não</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="servico">Tipo de Serviço</label>
                    <livewire:select-component type="services" placeholder="Selecione o serviço" name="categoryService[]" id="categoryService" selected='' />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdHoras">Qtd. Horas</label>
                    <input type="number" min="0" class="form-control" wire:model.live="qtdHoras" name="qtdHoras[]" id="qtdHoras" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tipoVeiculo">Tipo veículo</label>
                    <livewire:select-component type="typesVehicle" placeholder="Selecione" name="typesVehicle[]" :selected="$typesVehicle" />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="vehiclesCategory[]">Categoria de veículo</label>
                    <livewire:select-component type="vehiclesCategory" placeholder="Selecione" name="vehiclesCategory[]" id="vehiclesCategory" :selected="$vehiclesCategory" />
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
                <div class="col-md-3 mb-3">
                    <!-- Esse vai ser o campo DIA da O.S. Exemplo: Dia 1, Dia 2, etc. -->
                    <label for="day">Dia</label>
                    <input type="number" class="form-control" name="day[]" id="day" required>
                </div>
                <div class="col-md-3 mb-3">
                    <!-- Esse vai ser o campo ID da O.S. Exemplo: V1, V2, S1, S2, etc. -->
                    <label for="identification">ID</label>
                    <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="execucacao">Data de execução</label>
                    <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="servico">Língua</label>
                    <livewire:select-component type="services" placeholder="Selecione a língua" name="driverLanguage[]" id="driverLanguage" selected='' />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="servico">Especialidades</label>
                    <livewire:select-component type="services" placeholder="Selecione a especialidade" name="driverSpeciality[]" id="driverSpeciality" selected='' />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="motoristaVeiculo">Motorista</label>
                    <select name="motoristaVeiculo[]" id="motoristaVeiculo"  class="form-control">
                        <option value="">Jorge Lucas</option>
                        <option value="">Antonio Juarez</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="modeloVeiculo">Modelo de veículo</label>
                    <select name="modeloVeiculo[]" id="modeloVeiculo"  class="form-control">
                        <option value="">Toyota Etios</option>
                        <option value="">Jeep Renegade</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="company">Empresa</label>
                    <select name="company[]" id="company"  class="form-control">
                        <option value="">B13 Company</option>
                        <option value="">ABC Transportes</option>
                    </select>
                </div>                
                
                <div class="col-md-3 mb-3">
                    <label for="horarioInicio">Horário Início</label>
                    <input type="number" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="horarioTermino">Horário Término</label>
                    <input type="number" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="kmInicio">Km Inicial</label>
                    <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="kmTermino">KM Final</label>
                    <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="pedagio">Pedágio</label>
                    <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="estacionamento">Estacionamento</label>
                    <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="despesas">Outras despesas</label>
                    <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="horasExcedidas">Horas excedidas</label>
                    <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="horasExcedidas">KM Percorridos</label>
                    <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="horasExcedidas">KM Excedidos</label>
                    <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
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
                <div class="col-md-3 mb-3">
                    <label for="horaExtra">Hora extra</label>
                    <input type="number" class="form-control" name="horaExtra[]" id="horaExtra" required>
                </div>
                <div class="col-md-3 mb-3">
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
        <div class="tab-pane fade" id="fechamento" role="tabpanel" aria-labelledby="fechamento-tab">
        </div>
      </div>
    </div>
 </div>
