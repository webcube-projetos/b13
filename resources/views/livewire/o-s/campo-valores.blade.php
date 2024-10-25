<div class="tw-flex tw-flex-wrap align-items-center justify-content-between">
    <div class="@if ($type == 'Locação') tw-w-[25%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="precoBase">Valor</label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" name="precoBase[]"
            id="precoBase" wire:model="precoBase" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[25%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="horaExtra">Hora extra</label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" wire:model="horaExtra"
            name="horaExtra[]" id="horaExtra" required>
    </div>
    @if ($type == 'Locação')
        <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
            <label for="kmBase">KM franquia</label>
            <input type="number" class="form-control" wire:model="kmBase" name="kmBase[]" id="kmBase" required>
        </div>
        <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
            <label for="kmExtra">KM extra</label>
            <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" wire:model="kmExtra"
                name="kmExtra[]" id="kmExtra" required>
        </div>
        <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
            <label for="kmExtraParceiro">Km Extra Parceiro</label>
            <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')"
                wire:model="kmExtraParceiro" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
        </div>
    @endif
    <div class="mb-3 tw-pr-[8px] @if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif">
        <label for="custoParceiro">Custo Parceiro</label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" wire:model="custoParceiro"
            name="custoParceiro[]" id="custoParceiro" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="extraParceiro">Hora Extra parceiro</label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" wire:model="extraParceiro"
            name="extraParceiro[]" id="extraParceiro" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="custoEmployee">
            @if ($type == 'Locação')
                Custo Motorista
            @else
                Custo Segurança
            @endif
        </label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')" wire:model="custoEmployee"
            name="custoEmployee[]" id="custoEmployee" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3">
        <label for="horaExtraEmployee">
            @if ($type == 'Locação')
                Custo Extra Motorista
            @else
                Custo Extra Segurança
            @endif
        </label>
        <input type="text" class="form-control" x-mask:dynamic="$money($input, ',', '.')"
            wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
    </div>
</div>
