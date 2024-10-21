<tr>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            readonly 
            name="day[]" 
            id="day" 
            required
            value="{{ $execucao->day }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="text" 
            class="form-control"
            wire:model.live="identification" 
            name="identification[]"
            id="identification" 
            maxlength="3" 
            required 
            value="{{ $execucao->identification }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="date" 
            class="form-control" 
            readonly 
            wire:model.live="date" 
            name="date" 
            id="date"
            required
        >
    </td>
    <td class="!tw-px-[5px]">
        <livewire:select-component 
            readonly="{{ true }}"
            type="categoryService"
            wire-model="linha_categoryService" 
            placeholder="Selecione o modelo do veículo" 
            name="categoryService[]"
            id="categoryService" 
            :selected="$service ?? ''" 
            target="linha-{{ $execucao->id }}"
            targetClass="{{ $targetClass }}" 
        />
    </td>
    <td class="!tw-px-[5px]">
        <livewire:select-component 
            readonly="{{ true }}" 
            type="vehicles_plate"
            wire-model="linha_vehicles_plate" 
            placeholder="Selecione o modelo do veículo" 
            name="vehicleModel[]"
            id="vehicleModel" 
            :selected="$vehicles_plate ?? ''" 
            target="linha-{{ $execucao->id }}" 
            targetClass="{{ $targetClass }}" 
        />
    </td>
    <td class="!tw-px-[5px]">
        <livewire:select-component 
            readonly="{{ true }}" type="employee_driver"
            wire-model="linha_employee_driver" 
            placeholder="Selecione o motorista" 
            name="employee[]" id="employee"
            selected='{{ $employee_driver ?? null }}' 
            wire:key="employee_driver-{{ rand() }}"
            target="linha-{{ $execucao->id }}" 
            targetClass="{{ $targetClass }}" 
        />
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="time" 
            class="form-control" 
            wire:model.live="start_time" 
            name="horarioInicio[]"
            id="horarioInicio" 
            required
            value="{{ $execucao->start_time }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="time" 
            class="form-control" 
            wire:model.live="end_time" 
            name="horarioTermino[]"
            id="horarioTermino" 
            required
            value="{{ $execucao->end_time }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="time" 
            class="form-control" 
            wire:model.live="exceed_time" 
            name="horasExcedidas[]"
            id="horasExcedidas" 
            readonly
            value="{{ $execucao->exceed_time }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="km_start" 
            name="kmInicio[]" 
            id="kmInicio" 
            required
            value="{{ $execucao->km_start }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="km_end" 
            name="kmTermino[]" 
            id="kmTermino" 
            required
            value="{{ $execucao->km_end }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="km_total" 
            name="kmPercorridos[]" 
            id="kmPercorridos"
            readonly
            value="{{ $execucao->km_total }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="km_exceeded" 
            name="kmExcedidos[]" 
            id="kmExcedidos"
            readonly
            value="{{ $execucao->km_exceeded }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="toll" 
            name="pedagio[]" 
            id="pedagio" 
            required
            value="{{ $execucao->toll }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="parking" 
            name="estacionamento[]"
            id="estacionamento" 
            required
            value="{{ $execucao->parking }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="another_expenses" 
            name="despesas[]"
            id="despesas" 
            required
            value="{{ $execucao->another_expenses }}"
        >
    </td>
    <td class="!tw-px-[5px]">
        <input 
            type="number" 
            class="form-control" 
            wire:model.live="total_service" 
            name="total_service[]"
            id="total_service" 
            required
            value="{{ $execucao->total_service }}"
        >
    </td>
</tr>
