<div class="tab-pane fade" id="conta" role="tabpanel" aria-labelledby="conta-tab">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ $dados['pageInfo']['title'] }}</h6>
        </div>
        
        <div class="card-body pt-4 p-3">
            <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
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
                            value="{{ $dados['pageInfo']['dados_bancarios']['nome_banco'] ?? '' }}"
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
                            value="{{ $dados['pageInfo']['dados_bancarios']['numero_banco'] ?? '' }}"
                            required
                        >
                    </div>
                    <div class="col-md-2">
                        <label for=""> Agência</label>
                        <input 
                            class="form-control" 
                            type="number" 
                            placeholder="012345" 
                            id="agencia"
                            name="agencia" 
                            maxlength="5"
                            value="{{ $dados['pageInfo']['dados_bancarios']['agencia'] ?? '' }}" 
                            required
                        >
                    </div>
                    <div class="col-md-4">
                        <label for=""> Conta Corrente</label>
                        <input 
                            class="form-control" 
                            type="number" 
                            placeholder="012345678-9" 
                            id="conta"
                            name="conta" 
                            maxlength="15" 
                            value="{{ $dados['pageInfo']['dados_bancarios']['conta'] ?? '' }}"
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
                            <option value="CPF">CPF</option>
                            <option value="Celular">Celular</option>
                            <option value="E-mail">E-mail</option>
                            <option value="Chave Aleatória">Chave Aleatória</option>
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
                            value="{{ $dados['pageInfo']['dados_bancarios']['chave_pix'] ?? '' }}"
                            required
                        >
                    </div>
                    <div class="col-md-3">
                        <label for="">Prefere receber</label>
                        <select 
                            class="form-control"  
                            id="tipo_chave"
                            name="tipo_chave" 
                            required
                        >
                            <option value="" selected disabled>Selecione uma opção</option>
                            <option value="Via PIX">Via PIX</option>
                            <option value="Via Conta">Via Conta</option>
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