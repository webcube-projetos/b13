<div>
    <div class="container-fluid">
        <div class="row mt-3 align-items-center">
            <div class="col-md-2 mb-3">
                <label for="custoTotalEmployee">Custo com funcionários:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="number" class="form-control" id="custoTotalEmployee" wire:model.live="custoTotalEmployee" readonly>
            </div>
            <div class="col-md-2 mb-3">
                <label for="custoTotalParceiro">Custo com parceiros:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="number" class="form-control" id="custoTotalParceiro" wire:model.live="custoTotalParceiro" readonly>
            </div>

            <div class="col-md-2 mb-3">
                <label for="custosAdicionais">Custos adicionais:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="number" class="form-control" id="custosAdicionais" wire:model.live="custosAdicionais" required>
            </div>

            <div class="col-md-6 text-end mb-3">
                <h2>Total: <span id="total-linha">R$ {{ $totalGeral }}</span></h2>
            </div>
        </div>
    </div>
</div>