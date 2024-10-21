<div class="row linha-add align-items-center mt-3 position-relative">
    <div class="col-lg-2">
        <label for="nome_contato">Data estimada</label>
        <input type="date" class="form-control" name="date[]" id="date" required>
    </div>
    <div class="col-lg-3">
        <label for="servico">Serviço</label>
        <select name="servico[]" id="servico"  class="form-control">
            <option value="" selected disabled>Servico Executado</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="profissional">Profissional/Empresa</label>
        <select name="profissional[]" id="profissional"  class="form-control">
            <option value="" selected disabled>Nome do profissional/empresa</option>
        </select>
    </div>
    <div class="col-lg-2">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" name="valor[]" id="valor" required readonly>
    </div>
    <div class="col-lg-2">
        <label for="cpf_contato">Status</label><br>
        <span class="badge bg-gradient-success">Pago</span>
        <!-- <span class="badge bg-gradient-danger">Não Pago</span> -->
    </div>
</div>