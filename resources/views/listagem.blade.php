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
                  <h6>{{ $config['title'] }}</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
              <!-- BOTÃO CADASTRAR -->
              @if ( $config['button_top'] ) 
                <div class="col-md-6 text-end">
                  <div class="card-header pb-0">
                    <a href="{{ route($config['button_top']['route']) }}" class="btn bg-gradient-info mt-4 mb-0">{{ $config['button_top']['name'] }}</a>
                  </div>
                </div> 
              @endif
            </div>
            <livewire:o-s.list-o-s :config="$config" :header="$header" />
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @endsection
