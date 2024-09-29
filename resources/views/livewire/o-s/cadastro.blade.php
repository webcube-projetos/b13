<div>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-lg-5">
                <div class="nav-wrapper position-relative end-0" wire:ignore>
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" id="cadastro-tab" data-bs-toggle="tab" data-bs-target="#cadastro" type="button" role="tab" aria-controls="cadastro" aria-selected="true">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" id="custos-tab" data-bs-toggle="tab" data-bs-target="#custos" type="button" role="tab" aria-controls="custos" aria-selected="true">Custos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" id="financeiro-tab" data-bs-toggle="tab" data-bs-target="#financeiro" type="button" role="tab" aria-controls="financeiro" aria-selected="true">Financeiro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <form action="{{ data_get($dados, 'pageInfo.form_action') }}" method="{{ data_get($dados, 'pageInfo.form_method') }}" role="form text-left">               
                            @csrf
                            <div class="row align-items-end">
                                <p class="fw-bold mt-4">Ordem de Serviço</p>
                                {{-- @foreach ($dados['sessions'] as $key => $group)
                                    @include('register.formRegister')
                                @endforeach --}}

                                <div class="cadastro-contatos mt-3" id="box-linhas-servico-os">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 text-lg-start text-center">
                                            <h6 class="fw-bold mb-4">Dados de serviço</h6>
                                        </div>
                                
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="servicos-tab" data-bs-toggle="tab" data-bs-target="#servicos" type="button" role="tab" aria-controls="servicos" aria-selected="true">Serviço</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="rotas-tab" data-bs-toggle="tab" data-bs-target="#rotas" type="button" role="tab" aria-controls="rotas" aria-selected="false">Execução</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="servicos" role="tabpanel" aria-labelledby="servicos-tab">
                                                <div class="linha-add row align-items-center pt-4">
                                                    <div class="col-lg-6">
                                                        <h3 class="h3">Lista Serviços</h3>
                                                    </div>
                                                    <div class="col-lg-6 text-end">
                                                        <div class="btn-group dropup">
                                                            <button type="button" class="btn bg-gradient-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                + Adicionar Serviço
                                                            </button>
                                                            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                                                <li><a wire:click="addLinhaServicoLocacao">+ Locação</a></li>
                                                                <li><a wire:click="addLinhaServicoSeguranca">+ Segurança</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div id="box-linhas-servico-os">
                                                        <div>
                                                            @foreach ($servicesOS as $service)
                                                                <livewire:o-s.services 
                                                                    wire:key="{{ $service['id']}}" 
                                                                    :serviceId="$service['id']" 
                                                                    :type="$service['type']" 
                                                                    :data="$service['data'] ?? null" 
                                                                />
                                                            @endforeach
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="rotas" role="tabpanel" aria-labelledby="rotas-tab">
                                                <div class="row linha-add position-relative">
                                                    <div class="col-12">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 text-end">
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
                                                                        <th scope="col">Serviço</th>
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicles_plate-{{ rand() }}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="employee_driver"
                                                                                placeholder="Selecione o motorista" name="employee[]" 
                                                                                id="employee" 
                                                                                selected='' 
                                                                                wire:key="employee_driver-{{ rand() }}"
                                                                             />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicles_plate-{{ rand() }}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                            type="employee_driver"
                                                                             placeholder="Selecione o motorista" name="employee[]" id="employee" selected=''
                                                                             wire:key="employee_driver-{{ rand() }}"
                                                                             />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicleModel-{{rand()}}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' wire:key="employee-{{rand()}}" />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicleModel-{{rand()}}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' wire:key="employee-{{rand()}}" />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicleModel-{{rand()}}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' wire:key="employee-{{rand()}}" />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicleModel-{{rand()}}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component
                                                                                type="employee_driver" 
                                                                                placeholder="Selecione o motorista" name="employee[]" 
                                                                                id="employee" 
                                                                                selected='' 
                                                                                wire:key="employee-{{rand()}}"
                                                                             />
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
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="" selected disabled>Serviço</option>
                                                                                <option value="">Diária 12H SUV</option>
                                                                                <option value="">Transfer IN</option>
                                                                                <option value="">Transfer OUT</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component 
                                                                                type="vehicles_plate" 
                                                                                placeholder="Selecione o modelo do veículo" 
                                                                                name="vehicleModel[]" 
                                                                                id="vehicleModel" 
                                                                                :selected="'test'" 
                                                                                :filter-by-type="'test'"
                                                                                wire:key="vehicleModel-{{rand()}}"
                                                                            /> 
                                                                        </td>
                                                                        <td>
                                                                            <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' wire:key="employee-{{rand()}}" />
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
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-4">
                                    <label for="formaDePagamento">Forma de pagamento</label>
                                    <select name="formaDePagamento" id="formaDePagamento"  class="form-control">
                                        <option value="" disabled selected>Selecione a forma de pagamento</option>
                                        <option value="">Entrada 50% + 50% </option>
                                        <option value="">100% antes do início do serviço</option>
                                        <option value="">100% após o início do serviço</option>
                                        <option value="">Entrada 50% + 25% + 25%</option>
                                        <option value="">30/60/90</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 text-end mt-4">
                                    <h2><span class="text-sm">Total:</span> <span id="totalOrcamento">R$0,00</span></h2>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button x-on:click="$event.preventDefault()" wire:click="$dispatch('saveOS')" type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="custos" role="tabpanel" aria-labelledby="custos-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <p class="fw-bold mt-4">Custos</p>
                        
                            @include('register.formCustos')

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">Atualizar dados</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="financeiro" role="tabpanel" aria-labelledby="financeiro-tab">
                @include('register.formFinanceiro')
            </div>
        </div>
    </div>
</div>

@script
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        $wire.on('saveOS', () => {
            Toastify({
                    text: "Cadastro realizado com sucesso!",
                    className: "info",
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    style: {
                    background: "#FF9921",
                    }
            }).showToast();

            const tabs = document.querySelectorAll('#myTab .nav-link');
            const contents = document.querySelectorAll('#myTabContent2 .tab-pane');

            tabs[0].classList.remove('active');
            contents[0].classList.remove('show');
            contents[0].classList.remove('active');

            tabs[1].classList.add('active');
            contents[1].classList.add('active');
            contents[1].classList.add('show');
            
        });
    </script>
@endscript