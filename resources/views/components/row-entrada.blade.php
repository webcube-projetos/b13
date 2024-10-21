<div class="row linha-add align-items-center mt-3 position-relative">
    <div class="col-lg-5">
        <label for="nome_contato">Data pagamento</label>
        <input type="date" class="form-control" name="date[]" id="date" required>
    </div>
    <div class="col-lg-5">
        <label for="cpf_contato">Valor</label>
        <input type="number" class="form-control" name="valor[]" id="valor" required readonly>
    </div>
    <div class="col-lg-2">
        <label for="cpf_contato">Status</label><br>
        <span class="badge bg-gradient-success">Pago</span>
        <!-- <span class="badge bg-gradient-danger">Não Pago</span> -->
    </div>
</div>