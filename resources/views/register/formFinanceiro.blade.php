<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2>Entradas</h2>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="javascript:;" id="addLinhaEntrada" class="btn bg-gradient-dark btn-md mt-4 mb-4">+
                                Adicionar entrada</a>
                        </div>
                        <div class="col-12">
                            <select name="formaDePagamento" id="formaDePagamento" class="form-control" readonly>
                                <option value="" disabled selected>Selecione a condição de pagamento</option>
                                <option value="1">A VISTA</option>
                                <option value="2">50% NA RESERVA 50% NO TÉRMINO DO SERVIÇO</option>
                                <option value="2">50% NA RESERVA 50% FATURADO PARA 30 DIAS</option>
                                <option value="2">50% NA RESERVA - 50% ANTES DO INÍCIO DO SERVIÇO</option>
                                <option value="1">100% NA RESERVA</option>
                                <option value="1">100% ANTES DO INÍCIO DO SERVIÇO</option>
                                <option value="1">100% NO TÉRMINO DO SERVIÇO</option>
                                <option value="1">FATURADO - 15 DIAS</option>
                                <option value="1">FATURADO - 30 DIAS </option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div id="box-linhas-entrada">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2>Saídas</h2>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="javascript:;" id="addLinhaSaida" class="btn bg-gradient-dark btn-md mt-4 mb-4">+
                                Adicionar saída</a>
                        </div>
                        <div class="col-12">
                            <div id="box-linhas-saida">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
