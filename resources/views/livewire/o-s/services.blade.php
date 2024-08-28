<div>
    <style>
        td input.form-control {
            min-width: 50px;
        }
    </style>
    @if($type == 'locacao')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="servicos-tab" data-bs-toggle="tab" data-bs-target="#servicos" type="button" role="tab" aria-controls="servicos" aria-selected="true">Serviço</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rotas-tab" data-bs-toggle="tab" data-bs-target="#rotas" type="button" role="tab" aria-controls="rotas" aria-selected="false">Execução</button>
            </li>
        </ul>
        <div class="tab-content mb-4" id="myTabContent">
            <div class="tab-pane fade show active" id="servicos" role="tabpanel" aria-labelledby="servicos-tab">
                <div class="row linha-add position-relative align-items-center">
                    <div class="col-md-3 mb-3">
                        <label for="inicio">Início</label>
                        <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="termino">Término</label>
                        <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="qtdDias">Qtd. Dias</label>
                        <input type="number" class="form-control" name="qtdDias[]" id="qtdDias" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="bilingue">Bilíngue</label>
                        <livewire:select-component type="bilingue" placeholder="" name="bilingue[]" :selected="$bilingue" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="servico">Tipo de Serviço</label>
                        <livewire:select-component type="categoryService" placeholder="Selecione o serviço" name="categoryService[]" id="categoryService" selected='' />
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="qtdHoras">Qtd. Horas</label>
                        <input type="number" min="0" class="form-control" wire:model.live="qtdHoras" name="qtdHoras[]" id="qtdHoras" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="tipoVeiculo">Tipo veículo</label>
                        <livewire:select-component type="typesVehicle" placeholder="Selecione" name="typesVehicle[]" :selected="$typesVehicle"/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="vehiclesCategory[]">Categoria de veículo</label>
                        <livewire:select-component type="vehiclesCategory" placeholder="Selecione" name="vehiclesCategory[]" id="vehiclesCategory" :selected="$vehiclesCategory" />
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="blindado">Blindado</label>
                        <livewire:select-component type="armored" placeholder="" name="armored[]" :selected="$armored" />
                    </div>

                    @if ($servicoCadastrado == 1)
                        <div class="col-12">
                            <select class="form-control" name="service_id" id="service_id" readonly>
                                <option value="{{ $serviceTemp->id }}">
                                    {{ $serviceTemp->name }} ({{ $serviceTemp->name_english }})
                                </option>
                            </select>
                        </div>
                    @elseif ($servicoCadastrado == 2)
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Nome" wire:model="nomeServico">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Nome em Inglês" wire:model="nomeServicoIngles">
                        </div>
                    @endif

                    <hr class="my-4">

                    <div class="col-md-3 mb-3">
                        <label for="precoBase">Valor</label>
                        <input type="number" class="form-control" wire:model="precoBase" name="precoBase[]" id="precoBase" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="horaExtra">Hora extra</label>
                        <input type="number" class="form-control" wire:model="horaExtra" name="horaExtra[]" id="horaExtra" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="kmBase">KM franquia</label>
                        <input type="number" class="form-control" wire:model="kmBase" name="kmBase[]" id="kmBase" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="kmExtra">KM extra</label>
                        <input type="number" class="form-control" wire:model="kmExtra" name="kmExtra[]" id="kmExtra" required>
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <label for="custoParceiro">Custo Parceiro</label>
                        <input type="number" class="form-control" wire:model="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="extraParceiro">Hora Extra parceiro</label>
                        <input type="number" class="form-control" wire:model="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="kmExtraParceiro">Km Extra Parceiro</label>
                        <input type="number" class="form-control" wire:model="kmExtraParceiro" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="custoEmployee">Custo Motorista</label>
                        <input type="number" class="form-control" wire:model="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="horaExtraEmployee">Custo Extra Motorista</label>
                        <input type="number" class="form-control" wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
                    </div>

                    <hr class="my-4">

                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="h4">Veículos</h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="#" class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar veículo</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="modeloVeiculo">Modelo de veículo</label>
                        <livewire:select-component 
                            type="vehicles_plate" 
                            placeholder="Selecione o modelo do veículo" 
                            name="vehicleModel[]" 
                            id="vehicleModel" 
                            :selected="$vehicleModel" 
                            :filter-by-type="$typesVehicle"  
                        /> 
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="company">Empresa</label>
                        <livewire:select-component type="empresas" placeholder="Selecione a empresa" name="empresas[]" id="empresas" selected='' />
                    </div>
                    <div class="col-md-1">
                        <a href="#">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-circle-info"></i>
                        </a>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informações do veículo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Placa do veículo:</strong> ABC1234</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="h4">Motoristas</h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="#" class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar motorista</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="servico">Língua</label>
                        <livewire:select-component type="languages" placeholder="Selecione a língua" name="employeeLanguage[]" id="employeeLanguage" selected='' />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="servico">Especialidades</label>
                        <livewire:select-component type="especialization_general" placeholder="Selecione a especialidade" name="employeeSpeciality[]" id="employeeSpeciality" selected='' />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="motoristaVeiculo">Motorista</label>
                        <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                    </div>
                    <div class="col-md-1">
                        <a href="#">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <i class="fa fa-circle-info"></i>
                        </a>
                    </div>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informações do motorista</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nome Completo:</strong> Jacinto P. Aquino</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="rotas" role="tabpanel" aria-labelledby="rotas-tab">
                <div class="row linha-add position-relative">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <h4 class="h4 mb-0">Diária 5 Horas Mini Van Executivo Blindado Bilingue</h4>
                            </div>
                            <div class="col-lg-3 text-end">
                                <a href="#" class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar rota</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Dia</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Veículo</th>
                                    <th scope="col">Motorista</th>
                                    <th scope="col">Início</th>
                                    <th scope="col">Término</th>
                                    <th scope="col">Execdias</th>
                                    <th scope="col">KM Inicial</th>
                                    <th scope="col">KM Final</th>
                                    <th scope="col">KM Percorridos</th>
                                    <th scope="col">KM Excedidos</th>
                                    <th scope="col">Pedágio</th>
                                    <th scope="col">Estacionamento</th>
                                    <th scope="col">Outras Despesas</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="day[]" id="day" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                                        </td>
                                        <td>
                                            <livewire:select-component 
                                                type="vehicles_plate" 
                                                placeholder="Selecione o modelo do veículo" 
                                                name="vehicleModel[]" 
                                                id="vehicleModel" 
                                                :selected="$vehicleModel" 
                                                :filter-by-type="$typesVehicle"  
                                            /> 
                                        </td>
                                        <td>
                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="day[]" id="day" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                                        </td>
                                        <td>
                                            <livewire:select-component 
                                                type="vehicles_plate" 
                                                placeholder="Selecione o modelo do veículo" 
                                                name="vehicleModel[]" 
                                                id="vehicleModel" 
                                                :selected="$vehicleModel" 
                                                :filter-by-type="$typesVehicle"  
                                            /> 
                                        </td>
                                        <td>
                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="day[]" id="day" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                                        </td>
                                        <td>
                                            <livewire:select-component 
                                                type="vehicles_plate" 
                                                placeholder="Selecione o modelo do veículo" 
                                                name="vehicleModel[]" 
                                                id="vehicleModel" 
                                                :selected="$vehicleModel" 
                                                :filter-by-type="$typesVehicle"  
                                            /> 
                                        </td>
                                        <td>
                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="day[]" id="day" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                                        </td>
                                        <td>
                                            <livewire:select-component 
                                                type="vehicles_plate" 
                                                placeholder="Selecione o modelo do veículo" 
                                                name="vehicleModel[]" 
                                                id="vehicleModel" 
                                                :selected="$vehicleModel" 
                                                :filter-by-type="$typesVehicle"  
                                            /> 
                                        </td>
                                        <td>
                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="day[]" id="day" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                                        </td>
                                        <td>
                                            <livewire:select-component 
                                                type="vehicles_plate" 
                                                placeholder="Selecione o modelo do veículo" 
                                                name="vehicleModel[]" 
                                                id="vehicleModel" 
                                                :selected="$vehicleModel" 
                                                :filter-by-type="$typesVehicle"  
                                            /> 
                                        </td>
                                        <td>
                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 box-rota" id="box-linhas-rota">
                        
                    </div>
                </div>  
            </div>
        </div>
    @else 
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="servicos-tab" data-bs-toggle="tab" data-bs-target="#servicos" type="button" role="tab" aria-controls="servicos" aria-selected="true">Serviço</button>
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
                <div class="col-md-3 mb-3">
                    <label for="qtdDias">Qtd. Dias</label>
                    <input type="number" class="form-control" name="qtdDias[]" id="qtdDias" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="qtdServices">Qtd. Seguranças</label>
                    <input type="number" class="form-control" name="qtdServices[]" id="qtdServices" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="servico">Tipo de Serviço</label>
                    <livewire:select-component type="categoryService" placeholder="Selecione o serviço" name="categoryService[]" id="categoryService" selected='' />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="securityType[]">Tipo de Segurança</label>
                    <livewire:select-component type="securityType" placeholder="Selecione o tipo" name="securityType[]" :selected="$securityType" />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdHoras">Qtd. Horas</label>
                    <input type="number" min="0" class="form-control" wire:model.live="qtdHoras" name="qtdHoras[]" id="qtdHoras" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="bilingue[]">Bilingue</label>
                    <livewire:select-component type="bilingue" placeholder="" name="bilingue[]" :selected="$bilingue" />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="armed[]">Armado</label>
                    <livewire:select-component type="armed" placeholder="" name="armed[]" :selected="$armored" />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="driver[]">Motorista</label>
                    <livewire:select-component type="driver" placeholder="" name="driver[]" :selected="$driver" />
                </div>

                @if ($servicoCadastrado == 1)
                <div class="col-12">
                    <select class="form-control" name="service_id" id="service_id" readonly>
                        <option value="{{ $serviceTemp->id }}">
                            {{ $serviceTemp->name }} ({{ $serviceTemp->name_english }})
                        </option>
                    </select>
                </div>
            @elseif ($servicoCadastrado == 2)
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Nome" wire:model="nomeServico">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Nome em Inglês" wire:model="nomeServicoIngles">
                </div>
            @endif
            </div>
        </div>
        <div class="tab-pane fade" id="rotas" role="tabpanel" aria-labelledby="rotas-tab">
            <div class="row linha-add position-relative">
                <div class="col-md-1 mb-3">
                    <!-- Esse vai ser o campo DIA da O.S. Exemplo: Dia 1, Dia 2, etc. -->
                    <label for="day">Dia</label>
                    <input type="number" class="form-control" name="day[]" id="day" required>
                </div>
                <div class="col-md-1 mb-3">
                    <!-- Esse vai ser o campo ID da O.S. Exemplo: V1, V2, S1, S2, etc. -->
                    <label for="identification">ID</label>
                    <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="execucacao">Data de execução</label>
                    <input type="date" class="form-control" name="execucao[]" id="execucao" maxlength="30" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="servico">Língua</label>
                    <livewire:select-component type="languages" placeholder="Selecione a língua" name="employeeLanguage[]" id="employeeLanguage" selected='' />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="servico">Especialidades</label>
                    <livewire:select-component type="especialization_general" placeholder="Selecione a especialidade" name="employeeSpeciality[]" id="employeeSpeciality" selected='' />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="motoristaVeiculo">Segurança</label>
                    <livewire:select-component type="employee_security" placeholder="Selecione o segurança" name="employee[]" id="employee" selected='' />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="company">Empresa</label>
                    <livewire:select-component type="empresas" placeholder="Selecione a empresa" name="empresas[]" id="empresas" selected='' />
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
                    <label for="horasExcedidas">Horas excedidas</label>
                    <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="despesas">Outras despesas</label>
                    <input type="number" class="form-control" name="despesas[]" id="despesas" required>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="precos" role="tabpanel" aria-labelledby="precos-tab">
            <div class="row linha-add position-relative">
                <div class="col-md-3 mb-3">
                    <label for="precoBase">Valor</label>
                    <input type="number" class="form-control" wire:model="precoBase" name="precoBase[]" id="precoBase" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="horaExtra">Hora extra</label>
                    <input type="number" class="form-control" wire:model="horaExtra" name="horaExtra[]" id="horaExtra" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="custoParceiro">Custo Parceiro</label>
                    <input type="number" class="form-control" wire:model="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="extraParceiro">Hora Extra parceiro</label>
                    <input type="number" class="form-control" wire:model="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="custoEmployee">Custo Segurança</label>
                    <input type="number" class="form-control" wire:model="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="horaExtraEmployee">Hora Extra Segurança</label>
                    <input type="number" class="form-control" wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="fechamento" role="tabpanel" aria-labelledby="fechamento-tab">
        </div>
      </div>
    </div>
    @endif
 </div>
