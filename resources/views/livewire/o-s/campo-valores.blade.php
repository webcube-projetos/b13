<div class="tw-flex tw-flex-wrap align-items-center justify-content-between">
    <div class="@if ($type == 'Locação') tw-w-[25%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="precoBase">Valor</label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)" name="precoBase[]"
            id="precoBase" wire:model.live="precoBase" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[25%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="horaExtra">Hora extra</label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
            wire:model.live="horaExtra" name="horaExtra[]" id="horaExtra" required>
    </div>
    @if ($type == 'Locação')
        <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
            <label for="kmBase">KM franquia</label>
            <input type="number" class="form-control" wire:model.live="kmBase" name="kmBase[]" id="kmBase" required>
        </div>
        <div class="tw-w-[25%] mb-3 tw-pr-[8px]">
            <label for="kmExtra">KM extra</label>
            <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
                wire:model.live="kmExtra" name="kmExtra[]" id="kmExtra" required>
        </div>
        <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
            <label for="kmExtraParceiro">Km Extra Parceiro</label>
            <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
                wire:model.live="kmExtraParceiro" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
        </div>
    @endif
    <div class="mb-3 tw-pr-[8px] @if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif">
        <label for="custoParceiro">Custo Parceiro</label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
            wire:model.live="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="extraParceiro">Hora Extra parceiro</label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
            wire:model.live="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3 tw-pr-[8px]">
        <label for="custoEmployee">
            @if ($type == 'Locação')
                Custo Motorista
            @else
                Custo Segurança
            @endif
        </label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
            wire:model.live="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
    </div>
    <div class="@if ($type == 'Locação') tw-w-[20%] @else tw-w-[33%] @endif mb-3">
        <label for="horaExtraEmployee">
            @if ($type == 'Locação')
                Custo Extra Motorista
            @else
                Custo Extra Segurança
            @endif
        </label>
        <input type="text" class="form-control maskMoneyInputs" oninput="inputValor(this)"
            wire:model.live="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
    </div>
</div>

@script
    <script>
        document.addEventListener('livewire:initialized', function() {
            document.querySelectorAll('.maskMoneyInputs').forEach(input => {
                inputValor(input);
            });
        });

        $wire.on('masksUpdated', () => {
            $nextTick(() => {
                document.querySelectorAll('.maskMoneyInputs').forEach(input => {
                    inputValor(input);
                });
            });
        });
    </script>
@endscript
