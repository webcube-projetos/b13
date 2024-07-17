<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2>Entradas</h2>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="javascript:;" id="addLinhaEntrada" class="btn bg-gradient-dark btn-md mt-4 mb-4">+ Adicionar entrada</a>
                            </div>
                            <div class="col-12">
                                <select name="formaDePagamento" id="formaDePagamento"  class="form-control">
                                    <option value="" disabled selected>Selecione a forma de pagamento</option>
                                    <option value="1">30 dias</option>
                                    <option value="2">30/60</option>
                                    <option value="3">30/60/90</option>
                                    <option value="4">Entrada 50% + 50% </option>
                                    <option value="5">Entrada 50% + 25% + 25%</option>
                                    <option value="6">Pagamento antecipado</option>
                                    <option value="7">Pagamento após a finalização do serviço</option>
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
                                <a href="javascript:;" id="addLinhaSaida" class="btn bg-gradient-dark btn-md mt-4 mb-4">+ Adicionar saída</a>
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
</div>