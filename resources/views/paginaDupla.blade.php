@extends('layouts.user_type.auth')

@push('headPagina')
	@vite(['resources/js/listagens.js'])
	@vite(['resources/js/doublePage.js'])

@endpush

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        @if($config['infoLeft'])
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
              <div class="p-0" id="formRegister">
                @include('register.formRegisterSingle')
              </div>
            </div>
          </div>
        </div>
        @endif
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
