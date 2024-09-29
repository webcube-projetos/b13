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
  
