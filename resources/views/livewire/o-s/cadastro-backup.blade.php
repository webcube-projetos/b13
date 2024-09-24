<div>
    <style>
        .carousel-control-prev-icon, 
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5); /* Cor de fundo escura com transparência */
            filter: invert(1); /* Inverte as cores do ícone para branco */
        }
        .carousel-indicators [data-bs-target] {
            background-clip: padding-box;
            background-color: #000;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-lg-4">
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
                        <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                            @csrf
                            <div class="row align-items-end">
                                <p class="fw-bold mt-4">Ordem de Serviço</p>
                                @foreach ($dados['sessions'] as $key => $group)
                                    @include('register.formRegister')
                                @endforeach

                                <div class="servicos">
                                    <div class="accordion mb-4 mt-4" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button border" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                    V1 | Jeep Commander ABC1234
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show tw-bg-[#ffffff73]" aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
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
                                                            <select name="" id="" class="form-control">
                                                                <option value="" selected disabled>Selecione a opção</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="servico">Tipo de Serviço</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="" selected disabled>Selecione a opção</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="qtdHoras">Qtd. Horas</label>
                                                            <input type="number" min="0" class="form-control" wire:model.live="qtdHoras" name="qtdHoras[]" id="qtdHoras" required>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="tipoVeiculo">Tipo veículo</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="" selected disabled>Selecione a opção</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="vehiclesCategory[]">Categoria de veículo</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="" selected disabled>Selecione a opção</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="blindado">Blindado</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="" selected disabled>Selecione a opção</option>
                                                            </select>
                                                        </div>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p><strong>Motorista:</strong> R$250,00</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><strong>Pago pelo cliente:</strong> R$750,00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                <button class="accordion-button collapsed border tw-bg-[#ffffff73]" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                    Execução
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                                <div class="accordion-body">
                                                    <div id="carouselExampleIndicators" class="carousel slide">
                                                        <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Dia 1"></button>
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Dia 2"></button>
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Dia 3"></button>
                                                        </div>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <div class="row linha-add position-relative">
                                                                    <div class="col-md-1 mb-3">
                                                                        <!-- Esse vai ser o campo DIA da O.S. Exemplo: Dia 1, Dia 2, etc. -->
                                                                        <label for="day">Dia</label>
                                                                        <input type="number" value="1" class="form-control" name="day[]" id="day" required>
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
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="company">Empresa</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div> 
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="modeloVeiculo">Modelo de veículo</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Língua</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Especialidades</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="motoristaVeiculo">Motorista</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
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
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="horasExcedidas">Horas excedidas</label>
                                                                        <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmInicio">Km Inicial</label>
                                                                        <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmTermino">KM Final</label>
                                                                        <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="kmPercorridos">KM Percorridos</label>
                                                                        <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmExcedidos">KM Excedidos</label>
                                                                        <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
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
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <div class="row linha-add position-relative">
                                                                    <div class="col-md-1 mb-3">
                                                                        <!-- Esse vai ser o campo DIA da O.S. Exemplo: Dia 1, Dia 2, etc. -->
                                                                        <label for="day">Dia</label>
                                                                        <input type="number" value="2" class="form-control" name="day[]" id="day" required>
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
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="company">Empresa</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div> 
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="modeloVeiculo">Modelo de veículo</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Língua</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Especialidades</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="motoristaVeiculo">Motorista</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
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
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="horasExcedidas">Horas excedidas</label>
                                                                        <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmInicio">Km Inicial</label>
                                                                        <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmTermino">KM Final</label>
                                                                        <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="kmPercorridos">KM Percorridos</label>
                                                                        <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmExcedidos">KM Excedidos</label>
                                                                        <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
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
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <div class="row linha-add position-relative">
                                                                    <div class="col-md-1 mb-3">
                                                                        <!-- Esse vai ser o campo DIA da O.S. Exemplo: Dia 1, Dia 2, etc. -->
                                                                        <label for="day">Dia</label>
                                                                        <input type="number" class="form-control" name="day[]" id="day" value="3" required>
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
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="company">Empresa</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div> 
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="modeloVeiculo">Modelo de veículo</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Língua</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="servico">Especialidades</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="motoristaVeiculo">Motorista</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Selecione a opção</option>
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
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="horasExcedidas">Horas excedidas</label>
                                                                        <input type="number" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmInicio">Km Inicial</label>
                                                                        <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmTermino">KM Final</label>
                                                                        <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="kmPercorridos">KM Percorridos</label>
                                                                        <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="kmExcedidos">KM Excedidos</label>
                                                                        <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
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
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="custos" role="tabpanel" aria-labelledby="custos-tab">
                
            </div>
        </div>
    </div>
</div>