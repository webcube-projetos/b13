<div>
    @if ($type == 'locacao')
        <input type="hidden" name="idGlobal" @if($idGlobal) value="{{ $idGlobal }}" @endif>
        <div class="row linha-add mt-3 position-relative align-items-center">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6 mb-4">
                    <h5>Locação</h5>
                </div>
                <div class="col-md-6 mb-4 text-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="form-check align-items-center me-2">
                            <input class="form-check-input" type="checkbox" wire:model.live="parceiro" value="" id="parceiro">
                            <label class="custom-control-label" for="parceiro">Parceiro</label>
                        </div>
                        <button type="button" x-on:click="$dispatch('clonarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                        </button>
                        <button type="button" x-on:click="$dispatch('deletarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="inicio">Início</label>
                    <input type="date" class="form-control" wire:model="inicio" name="inicio[]" id="inicio" maxlength="30">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="termino">Término</label>
                    <input type="date" class="form-control" wire:model="termino" name="termino[]" id="termino" maxlength="30">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdDias">Qtd. Dias</label>
                    <input type="number" class="form-control" wire:model.live="qtdDias" name="qtdDias[]" id="qtdDias" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="qtdServices">Qtd. Veículos</label>
                    <input type="number" class="form-control" wire:model.live="qtdServices" name="qtdServices[]" id="qtdServices" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="idioma">Idioma Motorista</label>
                    <select name="idioma[]" id="idioma" wire:model="idioma" class="form-control">
                        <option value="" selected disabled>Idioma</option>
                        <option value="">Inglês</option>
                        <option value="">Espanhol</option>
                    </select>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="service[]">Serviço</label>
                    <livewire:select-component type="servicesOS" placeholder="Selecione o serviço" name="service[]" :selected="$servicesOS" />
        
                </div>
                <div class="col-md-5 mb-3">
                    <label for="vehiclesCategory[]">Categoria de veículo</label>
                    <livewire:select-component type="vehiclesCategory" placeholder="Selecione a categoria" name="vehiclesCategory[]" :selected="$vehiclesCategory" />
                </div>
                <div class="col-md-2 mb-3">
                    <label for="typesVehicle[]">Tipo veículo</label>
                    <livewire:select-component type="typesVehicle" placeholder="Selecione" name="typesVehicle[]" :selected="$typesVehicle" />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="selectBrand[]">Modelo de veículo</label>
                    <livewire:select-component type="selectBrand" placeholder="Veiculos" name="selectBrand[]" :selected="$selectBrand" />
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-check align-items-center">
                        <input class="form-check-input" type="checkbox" wire:model="similar" value="" id="similar" checked="">
                        <label class="custom-control-label" for="similar">Similar</label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="armored[]">Blindado</label>
                        <livewire:select-component type="armored" placeholder="" name="armored[]" :selected="$armored" />
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="precoBase">Valor franquia</label>
                    <input type="number" min="0" class="form-control" wire:model.live="precoBase" name="precoBase[]" id="precoBase" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="horaBase">Hora franquia</label>
                    <input type="number" min="0" class="form-control" wire:model="horaBase" name="horaBase[]" id="horaBase" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="horaExtra">Hora extra</label>
                    <input type="number" min="0" class="form-control" wire:model="horaExtra" name="horaExtra[]" id="horaExtra" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="kmBase">KM franquia</label>
                    <input type="number" min="0" class="form-control" wire:model="kmBase" name="kmBase[]" id="kmBase" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="kmExtra">KM extra</label>
                    <input type="number" min="0" class="form-control" wire:model="kmExtra" name="kmExtra[]" id="kmExtra" required>
                </div>
        
                <div class="col-md-2 mb-3">
                    <label for="custoParceiro">Custo Parceiro</label>
                    <input type="number" min="0" class="form-control" wire:model.live="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="extraParceiro">Hora Extra parceiro</label>
                    <input type="number" min="0" class="form-control" wire:model="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="kmExtraParceiro">Km Extra Parceiro</label>
                    <input type="number" min="0" class="form-control" wire:model="kmExtraParceiro" name="kmExtraParceiro[]" id="kmExtraParceiro" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="custoEmployee">Custo Motorista</label>
                    <input type="number" min="0" class="form-control" wire:model.live="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="horaExtraEmployee">Custo Extra Motorista</label>
                    <input type="number" min="0" class="form-control"  wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
                </div>
                <div class="col-12 text-end mt-3">
                    <h3>Total: <span id="total-linha">R$ {{ number_format($total, 2, ',', '.') }}</span></h3>
                </div>
            </div>
        </div>
    @else
        <input type="hidden" name="idGlobal" @if($idGlobal) value="{{ $idGlobal }}" @endif>
        <div class="row linha-add mt-3 position-relative">
            <div class="col-md-6 mb-4">
                <h5>Segurança</h5>
            </div>
            <div class="col-md-6 mb-4 text-end">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="form-check align-items-center me-2">
                        <input class="form-check-input" type="checkbox" wire:model.live="parceiro" value="" id="parceiro">
                        <label class="custom-control-label" for="parceiro">Parceiro</label>
                    </div>
                    <button type="button" x-on:click="$dispatch('clonarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                    </button>
                    <button type="button" x-on:click="$dispatch('deletarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="inicio">Início</label>
                <input type="date" class="form-control" wire:model="inicio" name="inicio[]" id="inicio" maxlength="30">
            </div>
            <div class="col-md-3 mb-3">
                <label for="termino">Término</label>
                <input type="date" class="form-control" wire:model="termino" name="termino[]" id="termino" maxlength="30">
            </div>
            <div class="col-md-3 mb-3">
                <label for="qtdDias">Qtd. Dias</label>
                <input type="nummber" class="form-control" wire:model.live="qtdDias" name="qtdDias[]" id="qtdDias" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="qtdServices">Qtd. Seguranças</label>
                <input type="nummber" class="form-control" wire:model.live="qtdServices" name="qtdServices[]" id="qtdServices" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="servico">Serviço</label>
                <livewire:select-component type="servicesOS" placeholder="Selecione o serviço" name="servicesOS[]" selected='' />
            </div>
            <div class="col-md-6 mb-3">
                <label for="vehiclesCategory">Categoria de veículo</label>
                <livewire:select-component type="vehiclesCategory" placeholder="Selecione a categoria" name="vehiclesCategory[]" selected='' />
            </div>


            <div class="col-md-4 mb-3">
                <label for="precoBase">Valor franquia</label>
                <input type="number" min="0" class="form-control" wire:model.live="precoBase" name="precoBase[]" id="precoBase" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="horaBase">Hora franquia</label>
                <input type="number" min="0" class="form-control" wire:model="horaBase" name="horaBase[]" id="horaBase" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="horaExtra">Hora extra</label>
                <input type="number" min="0" class="form-control" wire:model="horaExtra" name="horaExtra[]" id="horaExtra" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="custoParceiro">Custo Parceiro</label>
                <input type="number" min="0" class="form-control" wire:model.live="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="extraParceiro">Hora Extra parceiro</label>
                <input type="number" min="0" class="form-control" wire:model="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="custoEmployee">Custo Segurança</label>
                <input type="number" min="0" class="form-control" wire:model.live="custoEmployee" name="custoEmployee[]" id="custoEmployee" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="horaExtraEmployee">Hora Extra Segurança</label>
                <input type="number" min="0" class="form-control" wire:model="horaExtraEmployee" name="horaExtraEmployee[]" id="horaExtraEmployee" required>
            </div>
            <div class="col-12 text-end mt-3">
                <h3>Total: <span id="total-linha">R$ {{ number_format($total, 2, ',', '.') }}</span></h3>
            </div>
        </div>
    @endif
</div>