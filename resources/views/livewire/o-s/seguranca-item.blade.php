<div>
    <div
        class="tw-flex tw-flex-wrap tw-items-center tw-justify-between tw-columns-4 tw-bg-[#fff] tw-p-[10px] tw-rounded-[5px] tw-mb-[16px] tw-relative">
        <div class="tw-absolute tw-right-0 tw-top-[6px] tw-flex tw-gap-[16px]">
            <div class="col-md-1">
                <button x-on:click="$event.preventDefault()"
                    wire:click="deleteSeguranca('{{ data_get($seguranca, 'id') }}')">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            <div class="col-md-1">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-info-circle"></i>
                </a>
            </div>
        </div>
        <div class="mb-3 tw-w-[50%] tw-pr-[8px]">
            <label for="start">Início</label>
            <input type="date" class="form-control" wire:model="start" name="start[]" id="start" maxlength="30"
                required>
        </div>
        <div class="mb-3 tw-w-[50%] tw-pr-[8px]">
            <label for="end">Término</label>
            <input type="date" class="form-control" wire:model="end" name="end[]" id="end" maxlength="30"
                required>
        </div>
        <div class="mb-3 tw-w-[33%] tw-pr-[8px]">
            <label for="servico">Língua</label>
            <livewire:select-component wire:key="employeeLanguage-{{ data_get($seguranca, 'id') }}" type="languages"
                target="cadastro_seguranca-{{ data_get($seguranca, 'id') }}" placeholder="Selecione a língua"
                name="employeeLanguage[]" id="employeeLanguage" selected='{{ $languages ?? null }}'
                targetClass="{{ $targetClass }}" />
        </div>
        <div class="mb-3 tw-w-[33%] tw-pr-[8px]">
            <label for="servico">Especialidades</label>
            <livewire:select-component wire:key="employeeSpeciality-{{ data_get($seguranca, 'id') }}"
                type="especialization_general" target="cadastro_seguranca-{{ data_get($seguranca, 'id') }}"
                placeholder="Selecione a especialidade" name="employeeSpeciality[]" id="employeeSpeciality"
                selected='{{ $especialization_general ?? null }}' targetClass="{{ $targetClass }}" />
        </div>
        <div class="mb-3 tw-w-[33%]">
            <label for="segurancaVeiculo">Segurança</label>
            <livewire:select-component
                wire:key="employee_security-{{ data_get($seguranca, 'id') . $especialization_general . $languages }}"
                type="employee_security" target="cadastro_seguranca-{{ data_get($seguranca, 'id') }}"
                placeholder="Selecione o seguranca" name="employee[]" id="employee" :filter="['specializations' => ['id1' => $especialization_general, 'id2' => $languages]]"
                targetClass="{{ $targetClass }}" selected='{{ $employee_driver ?? null }}' search="true" />
        </div>

    </div>

</div>
