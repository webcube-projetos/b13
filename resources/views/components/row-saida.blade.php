<div class="row linha-add align-items-center mt-3 position-relative">
    <div class="col-lg-3">
        <label for="nome_contato">Data estimada</label>
        <input type="date" class="form-control" name="data_estimada[]" id="data_estimada" required>
    </div>
    <div class="col-lg-3">
        <label for="servico">Serviço</label>
        <select name="servico[]" id="servico"  class="form-control">
            <option value="" selected disabled>Selecione o serviço</option>
            <option value="">Transfer In</option>
            <option value="">Transfer Out</option>
            <option value="">Diária 5h</option>
        </select>
    </div>
    <div class="col-lg-2">
        <label for="profissional">Profissional</label>
        <select name="profissional[]" id="profissional"  class="form-control">
            <option value="" selected disabled>Selecione o profissional</option>
            <option value="">Motorista 1</option>
            <option value="">Motorista 2</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" name="valor[]" id="valor" required>
    </div>
    <div class="col-md-1">
        <a href="javascript:;" class="button-actions text-secondary font-weight-bold text-xs me-2 deletarLinha">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    </div>
</div>