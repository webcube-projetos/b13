@extends('layouts.user_type.auth')

@push('headPagina')
	@vite(['resources/js/listagens.js'])
@endpush

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-5">
          <div class="card mb-4">
            <div class="row align-items-center mb-4">
              <!-- TÍTULO TABELA -->
              <div class="col-12">
                <div class="card-header pb-0">
                  <h6>{{ $config['infoLeft']['title'] }}</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
            </div>
            <div class="card-body pt-0 pb-2">
              <div class="p-0" id="tableList">
                <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                    @csrf
                    <div class="row">
                        @foreach ($dados['sessions'] as $key => $group)
                            @include('register.formRegister')
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
        <div class="col-7">
          <div class="card mb-4">
            <div class="row align-items-center mb-4">
              <!-- TÍTULO TABELA -->
              <div class="col-md-6">
                <div class="card-header pb-0">
                  <h6>{{ $config['infoRight']['title'] }}</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0" id="tableList">
								@include('listagem.tableListPage')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @endsection
