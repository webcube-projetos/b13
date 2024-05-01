<div class="tab-pane fade" id="conta" role="tabpanel" aria-labelledby="conta-tab">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ $dados['pageInfo']['title'] }}</h6>
        </div>
        @php $value = $dados['pageInfo']['value']; @endphp
        <div class="card-body pt-4 p-3">
            <form action="{{ route($dados['pageInfo']['form_action']) }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left" id="formDadosBancarios">
                <input type="hidden" name="id_bank" value="{{ $dados['pageInfo']['value']?->bank?->id ?? '' }}">
                <input type="hidden" name="id" value="{{ $dados['pageInfo']['value']?->id ?? '' }}">
                <input type="hidden" name="tipo" value="bank">
                @csrf
                <div class="row">
                    <p class="fw-bold mb-2">Dados Bancários</p>
                    
                    <div class="col-md-4">
                        <label for="">Nome do Banco</label>
                        <input 
                            class="form-control"
                            type="text"
                            placeholder="Nome do Banco"
                            id="nome_banco"
                            name="nome_banco"
                            maxlength="20"
                            value="{{ $value?->bank?->bank ?? '' }}"
                            required
                        >
                    </div>
                    <div class="col-md-2">
                        <label for="">Número do Banco</label>
                        <input 
                            class="form-control" 
                            type="number" 
                            placeholder="0123" 
                            id="numero_banco"
                            name="numero_banco" 
                            maxlength="4" 
                            value="{{ $value?->bank?->bank_number ?? '' }}"
                            required
                        >
                    </div>
                    <div class="col-md-2">
                        <label for="">Agência</label>
                        <input 
                            class="form-control" 
                            type="number" 
                            placeholder="012345" 
                            id="agencia"
                            name="agencia" 
                            maxlength="5"
                            value="{{ $value?->bank?->agency ?? '' }}" 
                            required
                        >
                    </div>
                    <div class="col-md-4">
                        <label for=""> Conta Corrente</label>
                        <input 
                            class="form-control" 
                            type="text" 
                            placeholder="012345678-9" 
                            id="conta"
                            name="conta" 
                            maxlength="15" 
                            value="{{ $value?->bank?->cc ?? '' }}"
                            required
                        >
                    </div>
                </div>
                <div class="row mt-4">
                    <p class="fw-bold mb-2">Chave PIX</p>
                    <div class="col-md-3">
                        <label for="">Tipo de Chave</label>
                        <select 
                            class="form-control"  
                            id="tipo_chave"
                            name="tipo_chave" 
                            required
                        >
                            <option value="" selected disabled>Selecione um tipo</option>
                            <option @if($value?->bank?->key_type == 'CPF') selected @endif value="CPF">CPF</option>
                            <option @if($value?->bank?->key_type == 'Celular') selected @endif value="Celular">Celular</option>
                            <option @if($value?->bank?->key_type == 'E-mail') selected @endif value="E-mail">E-mail</option>
                            <option @if($value?->bank?->key_type == 'Chave Aleatória') selected @endif value="Chave Aleatória">Chave Aleatória</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Chave PIX</label>
                        <input 
                            class="form-control" 
                            type="text" 
                            placeholder="Chave" 
                            id="chave_pix"
                            name="chave_pix" 
                            maxlength="255" 
                            value="{{ $value?->bank?->key ?? '' }}"
                            required
                        >
                    </div>
                    <div class="col-md-3">
                        <label for="">Prefere receber</label>
                        <select 
                            class="form-control"  
                            id="preference"
                            name="preference" 
                            required
                        >
                            <option value="" selected disabled>Selecione uma opção</option>
                            <option @if($value?->bank?->preference == 'Via PIX') selected @endif value="Via PIX">Via PIX</option>
                            <option @if($value?->bank?->preference == 'Via Conta') selected @endif value="Via Conta">Via Conta</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                </div>
            </form>
        </div>
    </div>
</div>