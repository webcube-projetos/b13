<div class="row linha-add mt-3">
    <div class="col-md-5">
        <label for="nome_contato">Tipo</label>
        <select name="tipo_adicional[]" id="tipo_adicional"  class="form-control">
            <option value="" selected disabled>Selecione a especialização</option>
            <option value="">Idioma</option>
            <option value="">Segurança</option>
            <option value="">Motorista</option>
        </select>
    </div>
    <div class="col-md-5">
        <label for="nome_contato">Especialização</label>
        <select name="adicional[]" id="adicional"  class="form-control">
            <option value="" selected disabled></option>
            <option value="">Inglês</option>
            <option value="">Francês</option>
            <option value="">Espanhol</option>
            <option value="">Italiano</option>
        </select>
    </div>
    <div class="col-md-2">
        <a href="javascript:;" class="button-actions text-secondary font-weight-bold text-xs me-2 deletarLinha">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    </div>
</div>