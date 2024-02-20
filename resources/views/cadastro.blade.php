@extends('layouts.user_type.auth')

@section('content')

@push('headPagina')
	@vite(['resources/js/utils.js'])
@endpush

<div>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                       <li class="nav-item">
                          <a class="nav-link mb-0 px-0 py-1 active" id="cadastro-tab" data-bs-toggle="tab" data-bs-target="#cadastro" type="button" role="tab" aria-controls="cadastro" aria-selected="true">Cadastro</a>
                       </li>
                       <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" id="conta-tab" data-bs-toggle="tab" data-bs-target="#conta" type="button" role="tab" aria-controls="conta" aria-selected="true">Conta Bancária</a>
                       </li>
                     </ul>
                 </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{ $dados['pageInfo']['title'] }}</h6>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                            @csrf
                            <div class="row">
                                @foreach ($dados['sessions'] as $key => $group)
                                    <p class="fw-bold">{{ $key }}</p>
        
                                    @include('register.formRegister');
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
        
                    </div>
                </div>
            </div>
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
        </div>
        
    </div>
</div>
@endsection
