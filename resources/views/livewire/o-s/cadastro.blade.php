<div>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-lg-5">
                <div class="nav-wrapper position-relative end-0" wire:ignore>
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" id="cadastro-tab" data-bs-toggle="tab"
                                data-bs-target="#cadastro" type="button" role="tab" aria-controls="cadastro"
                                aria-selected="true">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" id="financeiro-tab" data-bs-toggle="tab"
                                data-bs-target="#financeiro" type="button" role="tab" aria-controls="financeiro"
                                aria-selected="true">Financeiro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <form action="{{ data_get($dados, 'pageInfo.form_action') }}"
                            method="{{ data_get($dados, 'pageInfo.form_method') }}" role="form text-left">
                            @csrf
                            <div class="row align-items-end">
                                <p class="fw-bold mt-4">Ordem de Serviço</p>
                                @foreach ($dados['sessions'] as $key => $group)
                                    @include('register.formRegister')
                                @endforeach

                                <div class="cadastro-contatos mt-3" id="box-linhas-servico-os">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 text-lg-start text-center">
                                            <h6 class="fw-bold mb-4">Dados de serviço</h6>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="servicos-tab" data-bs-toggle="tab"
                                                    data-bs-target="#servicos" type="button" role="tab"
                                                    aria-controls="servicos" aria-selected="true">Serviço</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button x-on:click="$dispatch('reload-executions')" class="nav-link"
                                                    id="rotas-tab" data-bs-toggle="tab" data-bs-target="#rotas"
                                                    type="button" role="tab" aria-controls="rotas"
                                                    aria-selected="false">Execução</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="servicos" role="tabpanel"
                                                aria-labelledby="servicos-tab">
                                                <livewire:o-s.tab-servicos :id="$id" />
                                            </div>
                                            <div class="tab-pane fade" id="rotas" role="tabpanel"
                                                aria-labelledby="rotas-tab">
                                                <livewire:o-s.tab-execucao :id="$id" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 text-end mt-4">
                                    <h2><span class="text-sm">Total:</span> <span
                                            id="totalOrcamento">R${{ number_format($total / 100, 2, ',', '.') }}</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button x-on:click="$event.preventDefault()" wire:click="$dispatch('saveOS')"
                                    type="submit"
                                    class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="financeiro" role="tabpanel" aria-labelledby="financeiro-tab">
                <livewire:o-s.financeiro :id="$id" />
            </div>
        </div>
    </div>
</div>

@script
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        $wire.on('saveOS', () => {
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

            $wire.dispatch('reload-executions');
            const tabs = document.querySelectorAll('#myTab .nav-link');

        });

        $wire.on('alert', (data) => {
            data = data[0]
            Toastify({
                text: data.message,
                className: data.type,
                close: true,
                gravity: "bottom",
                position: "right",
                style: {
                    background: data.type === 'warning' ? '#ff4c4c' : '#FF9921',

                }
            }).showToast();
        });
    </script>
@endscript
