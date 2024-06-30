<div>
    <input type="hidden" name="id_seguranca" @if($id_seguranca) value="{{ $id_seguranca }}" @endif>
  <div class="row linha-add mt-3 position-relative">
    <div class="col-md-6 mb-4">
        <h5>Segurança</h5>
    </div>
    <div class="col-md-6 mb-4 text-end">
        <button type="button" x-on:click="$dispatch('clonarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
            <i class="fa fa-clone" aria-hidden="true"></i>
        </button>
        <button type="button" x-on:click="$dispatch('deletarLinha', { serviceId: '{{ $serviceId }}' })" class="button-actions text-secondary font-weight-bold text-xs me-2">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
    </div>
    <div class="col-md-2 mb-3">
        <label for="inicio">Início</label>
        <input type="date" class="form-control" wire:model.live="inicio" name="inicio[]" id="inicio" maxlength="30" required>
    </div>
    <div class="col-md-2 mb-3">
        <label for="termino">Término</label>
        <input type="date" class="form-control" wire:model.live="termino" name="termino[]" id="termino" maxlength="30" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="qtdDias">Qtd. Dias</label>
        <input type="text" class="form-control" wire:model.live="qtdDias" name="qtdDias[]" id="qtdDias" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="qtdSegurancas">Qtd. Seguranças</label>
        <input type="text" class="form-control" wire:model.live="qtdSegurancas" name="qtdSegurancas[]" id="qtdSegurancas" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="servico">Serviço</label>
        <livewire:select-component type="servicesOS" placeholder="Selecione o serviço" name="servicesOS[]" selected='' />
    </div>
    <div class="col-md-6 mb-3">
        <label for="categoriaVeiculo">Categoria de veículo</label>
        <livewire:select-component type="vehiclesCategory" placeholder="Selecione a categoria" name="vehiclesCategory[]" selected='' />
    </div>


    <div class="col-md-4 mb-3">
        <label for="precoBase">Preço franquia</label>
        <input type="number" min="0" class="form-control" wire:model.live="precoBase" name="precoBase[]" id="precoBase" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="horaBase">Hora franquia</label>
        <input type="number" min="0" class="form-control" wire:model.live="horaBase" name="horaBase[]" id="horaBase" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="horaExtra">Hora extra</label>
        <input type="number" min="0" class="form-control" wire:model.live="horaExtra" name="horaExtra[]" id="horaExtra" required>
    </div>

    <div class="col-md-3 mb-3">
        <label for="custoParceiro">Custo Parceiro</label>
        <input type="number" min="0" class="form-control" wire:model.live="custoParceiro" name="custoParceiro[]" id="custoParceiro" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="extraParceiro">Hora Extra parceiro</label>
        <input type="number" min="0" class="form-control" wire:model.live="extraParceiro" name="extraParceiro[]" id="extraParceiro" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="custoSeguranca">Custo Segurança</label>
        <input type="number" min="0" class="form-control" wire:model.live="custoSeguranca" name="custoSeguranca[]" id="custoSeguranca" required>
    </div>
    <div class="col-md-3 mb-3">
        <label for="horaExtraSeguranca">Hora Extra Segurança</label>
        <input type="number" min="0" class="form-control" wire:model.live="horaExtraSeguranca" name="horaExtraSeguranca[]" id="horaExtraSeguranca" required>
    </div>
    <div class="col-12 text-end mt-3">
        <h3>Total: <span id="total-linha">R$ {{ number_format($total, 2, ',', '.') }}</span></h3>
    </div>
  </div>
</div>