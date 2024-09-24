<div class="tw-flex tw-flex-wrap align-items-center justify-content-between">
    <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
        <label for="precoBase">Valor</label>
        <input type="number" class="form-control" wire:model="precoBase" name="precoBase[]" id="precoBase" required>
    </div>
    <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
        <label for="horaExtra">Hora extra</label>
        <input type="number" class="form-control" wire:model="horaExtra" name="horaExtra[]" id="horaExtra" required>
    </div>
    <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
        <label for="kmBase">KM franquia</label>
        <input type="number" class="form-control" wire:model="kmBase" name="kmBase[]" id="kmBase" required>
    </div>
    <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
        <label for="kmExtra">KM extra</label>
        <input type="number" class="form-control" wire:model="kmExtra" name="kmExtra[]" id="kmExtra" required>
    </div>
    
    <div class="tw-w-[20%] mb-3 tw-pr-[8px]">
        <label for="custoParceiro">Custo Parceiro</label>
        <input type="number" class="form-control" wire:model="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
    </div>
    <div class="tw-w-[20%] mb-3 tw-pr-[8px]">
        <label for="extraParceiro">Hora Extra parceiro</label>
        <input type="number" class="form-control" wire:model="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
    </div>
    <div class="tw-w-[20%] mb-3 tw-pr-[8px]">
        <label for="kmExtraParceiro">Km Extra Parceiro</label>
        <input type="number" class="form-control" wire:model="kmExtraParceiro" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
    </div>
    <div class="tw-w-[20%] mb-3 tw-pr-[8px]">
        <label for="custoEmployee">Custo Motorista</label>
        <input type="number" class="form-control" wire:model="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
    </div>
    <div class="tw-w-[20%] mb-3">
        <label for="horaExtraEmployee">Custo Extra Motorista</label>
        <input type="number" class="form-control" wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
    </div>
</div>