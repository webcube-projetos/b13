<div class="tw-flex tw-flex-wrap tw-items-center tw-justify-between tw-columns-4 tw-bg-[#fff] tw-p-[10px] tw-rounded-[5px] tw-mb-[16px] tw-relative">
    <div class="tw-absolute tw-right-0 tw-top-[6px] tw-flex tw-gap-[16px]">
        <div class="col-md-1">
            <button 
                x-on:click="$event.preventDefault()" 
                wire:click="deleteMotorista('{{data_get($motorista, 'id')}}')">
                <i class="fa fa-trash"></i>
            </button>
        </div>
        <div class="col-md-1">
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-info-circle"></i>            
            </a>
        </div>
    </div>
    <div class="mb-3 tw-w-[25%] tw-pr-[8px]">
      <label for="inicio">Início</label>
      <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
    </div>
    <div class="mb-3 tw-w-[25%] tw-pr-[8px]">
        <label for="termino">Término</label>
        <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
    </div>
    <div class="mb-3 tw-w-[50%]">
        <label for="company">Empresa</label>
        <livewire:select-component
            wire:key="empresas-{{data_get($motorista, 'id')}}"
            target="cadastro_motorista-{{data_get($motorista, 'id')}}"
            type="empresas"
            placeholder="Selecione a empresa"    
            name="empresas[]" 
            id="empresas"
            selected="{{data_get($motorista, 'motorista.empresas')}}" 
        /> 
    </div>
    <div class="mb-3 tw-w-[25%] tw-pr-[8px]">
        <label for="modeloVeiculo">Modelo de veículo</label>
        <livewire:select-component 
            wire:key="vehicleModel-{{data_get($motorista, 'id')}}"
            type="vehicles_plate" 
            target="cadastro_motorista-{{data_get($motorista, 'id')}}"
            placeholder="Selecione o modelo do veículo" 
            name="vehicleModel[]" 
            id="vehicleModel" 
            :selected="$vehicleModel ?? ''" 
            :filter-by-type="$typesVehicle ?? ''"  
        /> 
    </div>
    <div class="mb-3 tw-w-[25%] tw-pr-[8px]">
        <label for="servico">Língua</label>
        <livewire:select-component
            wire:key="employeeLanguage-{{data_get($motorista, 'id')}}"
            type="languages"
            target="cadastro_motorista-{{data_get($motorista, 'id')}}"
            placeholder="Selecione a língua"
            name="employeeLanguage[]"
            id="employeeLanguage"
            selected=''
         />
    </div>
    <div class="mb-3 tw-w-[25%] tw-pr-[8px]">
        <label for="servico">Especialidades</label>
        <livewire:select-component
            wire:key="employeeSpeciality-{{data_get($motorista, 'id')}}"
            type="especialization_general"
            target="cadastro_motorista-{{data_get($motorista, 'id')}}"
            placeholder="Selecione a especialidade"
            name="employeeSpeciality[]"
            id="employeeSpeciality"
            selected='' 
        />
    </div>
    <div class="mb-3 tw-w-[25%]">
        <label for="motoristaVeiculo">Motorista</label>
        <livewire:select-component
            wire:key="employee_driver-{{data_get($motorista, 'id')}}"
            type="employee_driver"
            target="cadastro_motorista-{{data_get($motorista, 'id')}}"
            placeholder="Selecione o motorista"
            name="employee[]"
            id="employee"
            selected='' 
        />
    </div>
  
  </div>