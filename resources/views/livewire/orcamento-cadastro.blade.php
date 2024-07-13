<div>
    <div class="container-fluid py-4"  x-data="{ total: 0 }">
        <div class="row mb-4">
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