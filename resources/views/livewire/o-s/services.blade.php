<div>
    <style>
        td input.form-control {
            min-width: 50px;
        }
    </style>
    <div class="row linha-add position-relative align-items-center mt-4 tw-relative">
        <div class="accordion" id="accordionPanelsStayOpenExample-{{ $serviceId }}">
            <div class="accordion-item">
                <h2 class="accordion-header border bg-light" id="panelsStayOpen-headingOne-{{ $serviceId }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne-{{ $serviceId }}" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne-{{ $serviceId }}">
                        Serviço
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne-{{ $serviceId }}"
                    class="accordion-collapse collapse show tw-bg-[#ffffff73]"
                    aria-labelledby="panelsStayOpen-headingOne-{{ $serviceId }}">
                    <div class="accordion-body">
                        <livewire:o-s.campo-servico :type="$type" wire:key="servicos-{{ $serviceId }}"
                            :serviceId="$serviceId" :type="$type" />
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header border bg-light" id="panelsStayOpen-headingTwo-{{ $serviceId }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo-{{ $serviceId }}" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo-{{ $serviceId }}">
                        Valores
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo-{{ $serviceId }}"
                    class="accordion-collapse collapse tw-bg-[#ffffff73]"
                    aria-labelledby="panelsStayOpen-headingTwo-{{ $serviceId }}">
                    <div class="accordion-body">
                        <livewire:o-s.campo-valores :type="$type" :serviceId="$serviceId"
                            wire:key="servicos-{{ $serviceId }}" />
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header border bg-light" id="panelsStayOpen-headingThree-{{ $serviceId }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree-{{ $serviceId }}" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree-{{ $serviceId }}">
                        @if ($type == 'Locação')
                            Veículos & Motoristas
                        @else
                            Seguranças
                        @endif
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree-{{ $serviceId }}"
                    class="accordion-collapse collapse tw-bg-[#ffffff73] tw-p-[10px]"
                    aria-labelledby="panelsStayOpen-headingThree-{{ $serviceId }}">
                    <div class="accordion-body tw-p-0">
                        @if ($type == 'Locação')
                            <livewire:o-s.motorista-list wire:key="motoristas-{{ $serviceId }}" :serviceId="$serviceId" />
                        @else
                            <livewire:o-s.seguranca-list wire:key="segurancas-{{ $serviceId }}" :serviceId="$serviceId" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="tw-absolute tw-top-[14px] tw-right-[28px] tw-w-[15px]"
            x-on:click="$event.preventDefault(); $dispatch('removeLinhaServico',{serviceId: '{{ $serviceId }}'})">
            <i class="fa fa-trash"></i>
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informações</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Placa do veículo:</strong> ABC1234</p>
                        <p><strong>Cor:</strong> Prata</p>
                        <p><strong>Marca:</strong> Jeep</p>
                        <p><strong>Modelo:</strong> Commander</p>
                        <p><strong>Passageiros:</strong> 4</p>
                        <p><strong>Malas:</strong> 5</p>
                        <hr class="my-4">
                        <p><strong>Nome completo:</strong> Jorge Lucas</p>
                        <p><strong>Endereço completo:</strong> Rua Numero Um, 123 - Bairro, Cidade - ES - 012345-678
                        </p>
                        <p><strong>Telefone:</strong> (11) 99123-4567</p>
                        <p><strong>Email:</strong> email@corporativo.com</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @else

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
    </div> --}}
</div>
