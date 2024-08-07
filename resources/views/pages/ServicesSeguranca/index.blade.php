@extends('layouts.user_type.auth')

@push('headPagina')
	@vite(['resources/js/listagens.js'])
@endpush

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="row align-items-center mb-4">
              <!-- TÍTULO TABELA -->
              <div class="col-md-6">
                <div class="card-header pb-0">
                  <h6>{{ $config->title }}</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
              <!-- BOTÃO CADASTRAR -->
              @if ( $config->button_top ) 
                <div class="col-md-6 text-end">
                  <div class="card-header pb-0">
                    <a href="{{ route($config->button_top['route']) }}" class="btn bg-gradient-info mt-4 mb-0">{{ $config->button_top['name'] }}</a>
                  </div>
                </div> 
              @endif
            </div>
            <div class="row">
              <!-- FIM BOTÃO FILTRO -->
              <div class="col-md-6">
                <div class="card-header pb-0 pt-0">
                  <a href="#" class="btn bg-dark mt-4 mb-0 text-white"><i class="fa fa-bars"></i> FILTROS</a>
                </div>
              </div>
              <!-- FIM FILTRO -->
              <!-- BOTÃO SEARCH -->
              @if ( $config->search ) 
                <div class="col-md-6 text-end">
                  <div class="card-header pb-0">
                    <x-search-input :config="$config->search" />
                  </div>
                </div>
              @endif
              
              <!-- FIM SEARCH -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0" id="tableList">
								@include('pages.ServicesSeguranca.list')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @endsection
