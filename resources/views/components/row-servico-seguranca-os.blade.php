<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="seguranca-tab" data-bs-toggle="tab" data-bs-target="#seguranca" type="button" role="tab" aria-controls="seguranca" aria-selected="true">Serviços</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="operacao-tab" data-bs-toggle="tab" data-bs-target="#operacao" type="button" role="tab" aria-controls="operacao" aria-selected="false">Operação</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="custo-tab" data-bs-toggle="tab" data-bs-target="#custo" type="button" role="tab" aria-controls="custo" aria-selected="false">Preços</button>
    </li>
</ul>
<div class="tab-content mb-4" id="myTabContent">
    <div class="tab-pane fade show active" id="seguranca" role="tabpanel" aria-labelledby="seguranca-tab">
        <div class="row linha-add position-relative">
            <div class="col-md-1 mb-3">
                <label for="quantidade">Qtd. Dias</label>
                <input type="text" class="form-control" name="quantidade[]" id="quantidade" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="inicio">Início</label>
                <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="termino">Término</label>
                <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="servico">Serviço</label>
                <select name="servico[]" id="servico"  class="form-control">
                    <option value="" selected disabled>Selecione o serviço</option>
                    <option value="">Diária 5h</option>
                    <option value="">Diária 10h</option>
                    <option value="">Diária 12h</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="tipSeguranca">Tipo Segurança</label>
                <select name="tipSeguranca[]" id="tipSeguranca"  class="form-control">
                    <option value="">Patrimonial</option>
                    <option value="">Evento</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="armado">Armado</label>
                <select name="armado[]" id="armado"  class="form-control">
                    <option value="">Sim</option>
                    <option value="">Não</option>
                </select>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="operacao" role="tabpanel" aria-labelledby="operacao-tab">
        <div class="row linha-add position-relative">
            <div class="col-md-3 mb-3">
                <label for="execucacao">Data de execução</label>
                <input type="date" class="form-control" name="execucacao[]" id="execucacao" maxlength="30" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="tipoSeguranca">Tipo de segurança</label>
                <select name="tipoSeguranca[]" id="tipoSeguranca"  class="form-control">
                    <option value="">Patrimonial</option>
                    <option value="">Evento</option>
                </select>
            </div>
            <div class="col-md-5 mb-3">
                <label for="seguranca">Seguranca</label>
                <select name="seguranca[]" id="seguranca"  class="form-control">
                    <option value="">Jorge Afonso</option>
                    <option value="">Armando Aloízio</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="horarioInicio">Horário Início</label>
                <input type="number" class="form-control" name="horarioInicio[]" id="horarioInicio" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="horarioTermino">Horário Término</label>
                <input type="number" class="form-control" name="horarioTermino[]" id="horarioTermino" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="pedagio">Alimentação</label>
                <input type="number" class="form-control" name="alimentacao[]" id="alimentacao" required>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="custo" role="tabpanel" aria-labelledby="custo-tab">
        <div class="row linha-add position-relative">
            <div class="col-md-3 mb-3">
                <label for="precoBase">Preço franquia</label>
                <input type="number" class="form-control" name="precoBase[]" id="precoBase" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="horaBase">Hora franquia</label>
                <input type="number" class="form-control" name="horaBase[]" id="horaBase" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="horaExtra">Hora extra</label>
                <input type="number" class="form-control" name="horaExtra[]" id="horaExtra" required>
            </div>
            
            <div class="col-md-2 mb-3">
                <label for="custoParceiro">Custo Parceiro</label>
                <input type="number" class="form-control" name="custoParceiro[]" id="custoParceiro" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="extraParceiro">Hora Extra parceiro</label>
                <input type="number" class="form-control" name="extraParceiro[]" id="extraParceiro" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="custoSeguranca">Custo Segurança</label>
                <input type="number" class="form-control" name="custoSeguranca[]" id="custoSeguranca" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="horaExtraSeguranca">Custo Extra Segurança</label>
                <input type="number" class="form-control" name="horaExtraSeguranca[]" id="horaExtraSeguranca" required>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- 

-->