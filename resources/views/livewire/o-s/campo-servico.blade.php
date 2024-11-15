<div class="tw-flex tw-flex-wrap tw-items-center tw-justify-between tw-columns-5">
    <div class="tw-w-[25%] mb-3">
        <label for="inicio">Início</label>
        <input type="date" class="form-control" wire:model="inicio" name="inicio[]" id="inicio" maxlength="30" required>
    </div>
    <div class="tw-w-[25%] mb-3">
        <label for="termino">Término</label>
        <input type="date" class="form-control" wire:model="termino" name="termino[]" id="termino" maxlength="30"
            required>
    </div>
    <div class="tw-w-[15%] mb-3">
        <label for="qtdDias">Qtd. Dias</label>
        <input type="number" class="form-control" wire:model="qtdDias" name="qtdDias[]" id="qtdDias" required>
    </div>
    <div class="tw-w-[15%] mb-3">
        <label for="qtdHoras">Qtd. Horas</label>
        <input type="number" min="0" class="form-control" wire:model.live="qtdHoras" name="qtdHoras"
            id="qtdHoras" required>
    </div>
    <div class="tw-w-[15%] mb-3">
        <label for="qtdDias">
            @if ($type == 'Locação')
                Qtd. Veículos
            @else
                Qtd. Seguranças
            @endif
        </label>
        <input type="number" class="form-control" wire:model="qtdServices" name="qtdServices[]" id="qtdServices"
            required>
    </div>
    <div class="tw-w-[25%] mb-3">
        <label for="servico">Tipo de Serviço</label>
        <x-os.select-categories 
            :options="$serviceTypes" 
            :name="'idCategoryService[]'" 
            :id="'idCategoryService'" 
            wireModel="id_category_service"
            :selected="$data?->service?->categoryService?->id ?? null" 
        />
    </div>
    @if ($type == 'Locação')
        <div class="tw-w-[25%] mb-3">
            <label for="tipoVeiculo">Tipo veículo</label>
            <livewire:select-component 
                targetClass="{{ $targetClass }}" 
                target="campo-{{ $serviceId }}"
                type="typesVehicle" 
                placeholder="Selecione" 
                name="typesVehicle[]" 
                selected="{{ $data?->service?->vehicleType?->id ?? null }}" 
            />
        </div>
        <div class="tw-w-[15%] mb-3">
            <label for="vehiclesCategory[]">Categoria</label>
            <livewire:select-component 
                targetClass="{{ $targetClass }}" 
                target="campo-{{ $serviceId }}"
                type="vehiclesCategory" 
                placeholder="Selecione" 
                name="vehiclesCategory[]" 
                id="vehiclesCategory"
                selected="{{ $data?->service?->vehiclesCategory?->id ?? null }}"     
            />
        </div>
        <div class="tw-w-[15%] mb-3">
            <label for="blindado">Blindado</label>
            <livewire:select-component 
                targetClass="{{ $targetClass }}" 
                target="campo-{{ $serviceId }}"
                type="armored" 
                placeholder="" 
                name="armored[]" 
                :selected="$armored" 
            />
        </div>
    @else
        <div class="tw-w-[25%] mb-3">
            <label for="securityType[]">Tipo de Segurança</label>
            <livewire:select-component 
                targetClass="{{ $targetClass }}" 
                target="campo-{{ $serviceId }}"
                type="securityType" 
                placeholder="Selecione o tipo" 
                name="securityType[]"
                selected="{{ $data?->service?->categoryEspec?->id ?? null }}" 
            />
        </div>
        <div class="tw-w-[15%] mb-3">
            <label for="armored[]">Armado</label>
            <livewire:select-component 
                targetClass="{{ $targetClass }}" 
                target="campo-{{ $serviceId }}"
                type="armored" 
                placeholder="" 
                name="armored[]" 
                :selected="$armored" 
            />
        </div>
        <div class="tw-w-[15%] mb-3">
            <label for="driver[]">Motorista</label>
            <livewire:select-component 
                type="driver" 
                placeholder="Selecione" 
                name="driver[]" 
                :selected="$driver" 
            />
        </div>
    @endif
    <div class="tw-w-[15%] mb-3">
        <label for="bilingue">Bilíngue</label>
        <livewire:select-component 
            targetClass="{{ $targetClass }}" 
            target="campo-{{ $serviceId }}"
            type="bilingue" 
            placeholder="" 
            name="bilingue[]" 
            :selected="$bilingue" 
        />
    </div>


    @if ($servicoCadastrado == 1)
        <div class="tw-w-full">
            <select class="form-control" name="service_id" id="service_id" readonly>
                <option value="{{ $serviceTemp->id }}">
                    {{ $serviceTemp->name }} ({{ $serviceTemp->name_english }})
                </option>
            </select>
        </div>
    @elseif ($servicoCadastrado == 2)
        <div class="tw-w-[50%] mb-3 tw-pr-[8px]">
            <input type="text" class="form-control" placeholder="Nome" wire:model="nomeServico">
        </div>
        <div class="tw-w-[50%] mb-3">
            <input type="text" class="form-control" placeholder="Nome em Inglês" wire:model="nomeServicoIngles">
        </div>
    @endif
</div>
