<div>
    <div class="container-fluid py-4"  x-data="{ total: 0 }">
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="nav-wrapper position-relative end-0">
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
                        <form action="{{ $dados['pageInfo']['form_action'] ? route($dados['pageInfo']['form_action']) : '' }}" method="{{ $dados['pageInfo']['form_action'] ? $dados['pageInfo']['form_method'] : '' }}" role="form text-left" id="{{ $dados['pageInfo']['id'] }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-lg-6 mb-4">
                                    <p class="fw-bold mt-4">Orçamento</p>
                                </div>
                                <div class="col-lg-6 text-end mb-4">
                                    <a href="#" class="btn btn-dark">Converter para O.S</a>
                                </div>
                                @foreach ($dados['sessions'] as $key => $group)
                                    @include('register.formRegister')
                                @endforeach

                                @if ($dados['pageInfo']['cadastro_servicos'])
                                    @include('register.formServicos')
                                @endif

                                <div class="col-lg-6 mt-4">
                                    <label for="formaDePagamento">Forma de pagamento</label>
                                    <livewire:select-component type="paymentMethod" placeholder="Selecione a forma de pagamento" name="paymentMethod" selected='' />
                                </div>
                                <div class="col-lg-6 text-end mt-4" @update-global-total.window="total = $event.detail; console.log(total)">
                                    <h2><span class="text-sm">Total:</span> <span id="totalOrcamento">R$<span x-text="total"></span></span></h2>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button x-on:click="$event.preventDefault() ;$dispatch('saveOS')" type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
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

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
@endpush

@script
<script>
    $wire.on('osCreated', () => {
        Toastify({
            text: "Cadastro realizado com sucesso!",
            className: "info",
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
            background: "#FF9921",
            }
      }).showToast();
    });
</script>
@endscript