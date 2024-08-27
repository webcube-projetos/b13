<div>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="nav-wrapper position-relative end-0" wire:ignore>
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" id="cadastro-tab" data-bs-toggle="tab" data-bs-target="#cadastro" type="button" role="tab" aria-controls="cadastro" aria-selected="true">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" id="custos-tab" data-bs-toggle="tab" data-bs-target="#custos" type="button" role="tab" aria-controls="custos" aria-selected="true">Custos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" id="financeiro-tab" data-bs-toggle="tab" data-bs-target="#financeiro" type="button" role="tab" aria-controls="financeiro" aria-selected="true">Financeiro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                            @csrf
                            <div class="row align-items-end">
                                <p class="fw-bold mt-4">Ordem de Serviço</p>
                                @foreach ($dados['sessions'] as $key => $group)
                                    @include('register.formRegister')
                                @endforeach

                                @if ($dados['pageInfo']['cadastro_servicos'])
                                    @include('register.formServicosOS')
                                @endif

                                <div class="col-lg-6 mt-4">
                                    <label for="formaDePagamento">Forma de pagamento</label>
                                    <select name="formaDePagamento" id="formaDePagamento"  class="form-control">
                                        <option value="" disabled selected>Selecione a forma de pagamento</option>
                                        <option value="">Entrada 50% + 50% </option>
                                        <option value="">100% antes do início do serviço</option>
                                        <option value="">100% após o início do serviço</option>
                                        <option value="">Entrada 50% + 25% + 25%</option>
                                        <option value="">30/60/90</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 text-end mt-4">
                                    <h2><span class="text-sm">Total:</span> <span id="totalOrcamento">R$0,00</span></h2>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="custos" role="tabpanel" aria-labelledby="custos-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <p class="fw-bold mt-4">Custos</p>
                        
                            @include('register.formCustos')

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">Atualizar dados</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="financeiro" role="tabpanel" aria-labelledby="financeiro-tab">
                @include('register.formFinanceiro')
            </div>
        </div>
    </div>
</div>