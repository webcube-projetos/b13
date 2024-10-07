
    <tr>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" readonly name="day[]" id="day" required value="{{$execucao->day}}">
        </td>
        <td class="!tw-px-[5px]">
            <input type="text" class="form-control" wire:model.live="identification" name="identification[]" id="identification" maxlength="3" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="date" class="form-control" readonly wire:model.live="date" name="date" id="date" required>
        </td>
        <td class="!tw-px-[5px]">
            <select name="" id="" class="form-control">
                <option value="" selected disabled>Serviço</option>
                <option value="">Diária 12H SUV</option>
                <option value="">Transfer IN</option>
                <option value="">Transfer OUT</option>
            </select>
        </td>
        <td class="!tw-px-[5px]">
            <livewire:select-component 
                type="vehicles_plate" 
                wire-model="linha_vehicles_plate"
                placeholder="Selecione o modelo do veículo" 
                name="vehicleModel[]" 
                id="vehicleModel" 
                :selected="$vehicles_plate ?? ''" 
                target="linha-{{ $execucao->id }}"
                targetClass="{{$targetClass}}"
            /> 
        </td>
        <td class="!tw-px-[5px]">
            <livewire:select-component 
                type="employee_driver"
                wire-model="linha_employee_driver"
                placeholder="Selecione o motorista" name="employee[]" 
                id="employee" 
                selected='{{ $employee_driver ?? null }}' 
                wire:key="employee_driver-{{ rand() }}"
                target="linha-{{ $execucao->id }}"
                targetClass="{{$targetClass}}"
                />
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" wire:model.live="start_time" name="horarioInicio[]" id="horarioInicio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" wire:model.live="end_time" name="horarioTermino[]" id="horarioTermino" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" wire:model.live="exceed_time" name="horasExcedidas[]" id="horasExcedidas" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="km_start" name="kmInicio[]" id="kmInicio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="km_end" name="kmTermino[]" id="kmTermino" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="km_total" name="kmPercorridos[]" id="kmPercorridos" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="km_exceeded" name="kmExcedidos[]" id="kmExcedidos" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="toll" name="pedagio[]" id="pedagio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="parking" name="estacionamento[]" id="estacionamento" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" wire:model.live="another_expenses" name="despesas[]" id="despesas" required>
        </td>
    </tr>

