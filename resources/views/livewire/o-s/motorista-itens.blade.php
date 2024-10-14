<div>
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
		<label for="start">Início</label>
		<input type="date" class="form-control" wire:model="start" name="start[]" id="start" maxlength="30" required>
		</div>
		<div class="mb-3 tw-w-[25%] tw-pr-[8px]">
			<label for="end">Término</label>
			<input type="date" class="form-control" wire:model="end" name="end[]" id="end" maxlength="30" required>
		</div>
		<div class="mb-3 tw-w-[50%]">
			<label for="company">Empresa</label>
			<livewire:select-component
				wire:key="empresas-{{data_get($motorista, 'id') . $vehicleCompany }}"
				target="cadastro_motorista-{{data_get($motorista, 'id')}}"
				type="empresas"
				placeholder="Selecione a empresa"    
				name="empresas[]" 
				id="empresas"
				targetClass="{{$targetClass}}"
				selected="{{$vehicleCompany ?? $empresas ?? null}}" 
			/> 
		</div>
		<div class="mb-3 tw-w-[25%] tw-pr-[8px]">
			<label for="modeloVeiculo">Modelo de veículo</label>
			<livewire:select-component 
				wire:key="vehicleModel-{{data_get($motorista, 'id') . $typesVehicle . $empresas}}"
				type="vehicles_plate" 
				target="cadastro_motorista-{{data_get($motorista, 'id')}}"
				placeholder="Selecione o modelo do veículo" 
				name="vehicleModel[]" 
				id="vehicleModel" 
				:selected="$vehicles_plate ?? null" 
				:filter="['id_type' => $typesVehicle, 'id_company' => $empresas]"  
				targetClass="{{$targetClass}}"
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
				selected='{{$languages ?? null}}'
				targetClass="{{$targetClass}}"
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
				selected='{{$especialization_general ?? null}}' 
				targetClass="{{$targetClass}}"
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
				targetClass="{{$targetClass}}"
				selected='{{$employee_driver ?? null}}' 
				targetClass="{{$targetClass}}"
			/>
		</div>
	
	</div>
    
</div>
