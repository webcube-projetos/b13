
    <tr>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="day[]" id="day" required value="{{$day}}">
        </td>
        <td class="!tw-px-[5px]">
            <input type="text" class="form-control" name="identification[]" id="identification" maxlength="3" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="date" class="form-control" wire:model="date" name="date" id="date" required>
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
                placeholder="Selecione o modelo do veículo" 
                name="vehicleModel[]" 
                id="vehicleModel" 
                :selected="$vehicles_plate ?? ''" 
                :filter-by-type="'test'"
                wire:key="vehicles_plate-{{ rand() }}"
            /> 
        </td>
        <td class="!tw-px-[5px]">
            <livewire:select-component 
                type="employee_driver"
                placeholder="Selecione o motorista" name="employee[]" 
                id="employee" 
                selected='{{ $employee_driver ?? null }}' 
                wire:key="employee_driver-{{ rand() }}"
                />
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="time" class="form-control" name="horasExcedidas[]" id="horasExcedidas" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="kmInicio[]" id="kmInicio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="kmTermino[]" id="kmTermino" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="kmPercorridos[]" id="kmPercorridos" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="kmExcedidos[]" id="kmExcedidos" readonly>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="pedagio[]" id="pedagio" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="estacionamento[]" id="estacionamento" required>
        </td>
        <td class="!tw-px-[5px]">
            <input type="number" class="form-control" name="despesas[]" id="despesas" required>
        </td>
    </tr>

