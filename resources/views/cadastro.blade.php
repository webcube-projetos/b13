@extends('layouts.user_type.auth')

@section('content')

@push('headPagina')
	@vite(['resources/js/app.js'])
@endpush

@if (
        $prefix === 'clientes' ||
        $prefix === 'empresas' ||
        $prefix === 'motoristas' ||
        $prefix === 'segurancas' ||
        $prefix === 'veiculos'
    )
    <div>
        <div class="container-fluid py-4">
            <!-- SE DADOS BANCÁRIOS É TRUE, IMPRIME AS TABS NO TOPO DA PÁGINA -->
            @if ($dados['pageInfo']['dados_bancarios'] && !Str::contains(url()->current(), 'cadastro'))
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
                            <form action="{{ route($dados['pageInfo']['form_action']) }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left" id="{{ $dados['pageInfo']['id'] }}" enctype="multipart/form-data">
                                <input type="hidden" name="id" @isset($dados['pageInfo']['value']) value="{{ $dados['pageInfo']['value']->id }}" @endisset>
                                @csrf
                                <div class="row">
                                    @foreach ($dados['sessions'] as $key => $group)
                                        @if (data_get($dados, "sessions.$key.photo"))
                                            <div class="col-lg-6 mb-4">
                                                <p class="fw-bold">{{ $key }}</p>
                                            </div>
                                            <div class="col-lg-6 d-flex text-end mb-4">
                                                @php
                                                    $photoValue = data_get($dados, "sessions.$key.photo.value");
                                                @endphp
                                                <div>                        
                                                    <input 
                                                        class="form-control filepond" 
                                                        type="{{ data_get($dados, "sessions.$key.photo.type") }}" 
                                                        placeholder="{{ data_get($dados, "sessions.$key.photo.placeholder") }}" 
                                                        id="{{ data_get($dados, "sessions.$key.photo.id") }}"
                                                        name="{{ data_get($dados, "sessions.$key.photo.name") }}" 
                                                        maxlength="{{ data_get($dados, "sessions.$key.photo.maxlenghtRoute")}}" 
                                                        value="{{ $photoValue ?? '' }}"
                                                        {{ data_get($dados, "sessions.$key.photo.function") ? data_get($dados, "sessions.$key.photo.function.type") . '=' . data_get($dados, "sessions.$key.photo.function.name") : '' }}
                                                        {{ data_get($dados, "sessions.$key.photo.required") ? 'required' : '' }}
                                                    >
                                                </div>
                                                @if ($photoValue)
                                                    <a href="{{ asset($photoValue) }}" data-fancybox>
                                                        <img src="{{ asset($photoValue) }}" class="img-thumbnail" style="max-width: 200px;">
                                                    </a>
                                                @endif
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
    
@elseif ( $prefix === 'servicos-locacao' )
    <div class="container-fluid py-4">            
        <div class="row">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <form action="{{ route($dados['pageInfo']['form_action']) }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left" id="{{ $dados['pageInfo']['id'] }}" enctype="multipart/form-data">
                        <input type="hidden" name="id_service_type" value="Locação">
                        <input type="hidden" name="id" @isset($dados['pageInfo']['value']) value="{{ $dados['pageInfo']['value']->id }}" @endisset>
    
                        @csrf
                        <div class="row">
                            <p class="fw-bold mt-4">Locação</p>
                            @foreach ($dados['sessions']['locacao'] as $key => $group)
                                @include('register.formRegisterLocacao')
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@elseif ( $prefix === 'servicos-seguranca' )
    <div class="container-fluid py-4"> 
        <div class="row">
            <div class="card">
                <div class="card-body pt-4 p-3">
                        <form action="{{ route($dados['pageInfo']['form_action']) }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left" id="{{ $dados['pageInfo']['id'] }}2" enctype="multipart/form-data">
                        <input type="hidden" name="id_service_type" value="Segurança">
                        <input type="hidden" name="id" @isset($dados['pageInfo']['value']) value="{{ $dados['pageInfo']['value']->id }}" @endisset>
    
                        @csrf
                        <div class="row">
                            <p class="fw-bold mt-4">Segurança</p>
                            @foreach ($dados['sessions']['seguranca'] as $key => $group)
                                @include('register.formRegisterSeguranca')
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif



@endsection
