@extends('layouts.user_type.auth')

@section('content')

@push('headPagina')
	@vite(['resources/js/app.js'])
    @vite(['resources/js/addLines.js'])
@endpush

<div>
    <div class="container-fluid py-4">
        <!-- SE DADOS BANCÁRIOS É TRUE, IMPRIME AS TABS NO TOPO DA PÁGINA -->
        @if ($dados['pageInfo']['dados_bancarios'])
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
        @endif
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                        <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                            @csrf
                            <div class="row">
                                @foreach ($dados['sessions'] as $key => $group)
                                    @if (isset($dados['sessions']['Dados da Empresa']['foto']) && $key === 'Dados da Empresa')
                                        <div class="col-lg-6 mb-4">
                                            <p class="fw-bold">{{ $key }}</p>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <input 
                                                class="form-control" 
                                                type="{{ $dados['sessions']['Dados da Empresa']['foto']['type'] }}" 
                                                placeholder="{{ $dados['sessions']['Dados da Empresa']['foto']['placeholder'] }}" 
                                                id="{{ $dados['sessions']['Dados da Empresa']['foto']['id'] }}"
                                                name="{{ $dados['sessions']['Dados da Empresa']['foto']['name'] }}" 
                                                maxlength="{{ $dados['sessions']['Dados da Empresa']['foto']['maxlenghtRoute'] }}" 
                                                value="{{ $dados['sessions']['Dados da Empresa']['foto']['value'] ?? '' }}"
                                                {{ $dados['sessions']['Dados da Empresa']['foto']['function'] ? $dados['sessions']['Dados da Empresa']['foto']['function']['type'] . '=' . $dados['sessions']['Dados da Empresa']['foto']['function']['name'] : '' }}
                                                {{ $dados['sessions']['Dados da Empresa']['foto']['required'] ? 'required' : '' }}
                                            >
                                        </div>
                                    @else 
                                        <p class="fw-bold mt-4">{{ $key }}</p>
                                    @endif

                                    @include('register.formRegister')
                                @endforeach

                                <!-- SE CADASTRO CONTATOS É TRUE, IMPRIME A BOX DE CADASTRO -->
                                @if ($dados['pageInfo']['cadastro_contatos'])
                                    @include('register.formContact')
                                @endif

                                <!-- SE CADASTRO ADICIONAIS É TRUE, IMPRIME A BOX DE ADICIONAIS -->
                                @if ($dados['pageInfo']['cadastro_adicionais'])
                                    @include('register.formAdicionais')
                                @endif

                                <!-- SE CADASTRO ESPECIALIZAÇÕES É TRUE, IMPRIME A BOX DE ESPECIALIZAÇÕES -->
                                @if ($dados['pageInfo']['cadastro_especializacoes'])
                                    @include('register.formEspecializacoes')
                                @endif
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                            </div>
                        </form>
        
                    </div>
                </div>
            </div>

            <!-- SE DADOS BANCÁRIOS É TRUE, IMPRIME O CONTEÚDO DE DADOS BANCÁRIOS -->
            @if ($dados['pageInfo']['dados_bancarios'])
                @include('register.formBank')
            @endif
        </div>
    </div>
</div>
@endsection
