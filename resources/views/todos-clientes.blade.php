@php
  $data = [
    'page_info' => [
      'title' => 'Todos os clientes',
      'button_top' => [
        'name' => '+ Cadastrar Cliente',
        'route' => 'cadastrar-cliente.index',
      ],
      'search' => [
        'container_tag' => 'div',
        'container_class' => 'col-md-4',
        'id' => 'search',
        'name' => 'search',
        'placeholder' => 'Pesquisar por Razão/Apelido',
        'function' => false,
      ],
    ],
    'cliente' => [
      'header' => [
        'Razão Social',
        'Apelido',
        'Cidade',
        'País',
        'Ações',
      ],
      'botoes' => [
        [
          'route' => 'editar-cliente.index',
          'icon' => 'fa fa-pencil',
          'class' => 'table-action edit',
          'function' => false,
        ],
        [
          'route' => 'deletar-cliente.index',
          'icon' => 'fa fa-trash',
          'class' => 'table-action delete',
          'function' => false,
        ]
      ],
      'data' => [
        1 => [
          'razao_social' => 'Portimus Auto Center LTDA.',
          'apelido' => 'Alex Portimus',
          'cidade' => 'São José dos Campos - SP',
          'pais' => 'Brasil',
        ],
        2 => [
          'razao_social' => 'Portimus Auto Center LTDA.',
          'apelido' => 'Alex Portimus',
          'cidade' => 'São José dos Campos - SP',
          'pais' => 'Brasil',
        ]
      ],
    ],
  ];

  /*$data = [
    'page_info' => [
      'title' => 'Todos os motoristas',
      'button_top' => [
        'name' => '+ Cadastrar motorista',
        'route' => 'cadastrar-motorista.index',
      ],
      'search' => [
        'id' => 'search',
        'name' => 'search',
        'placeholder' => 'Pesquisar por Razão/Apelido',
        'function' => false,
      ],
    ],
    'table' => [
      'header' => [
        'Nome',
        'Empresa',
        'Cidade',
        'Status',
        'Ações',
      ],
      'botoes' => [
        [
          'route' => 'editar-motorista.index',
          'icon' => 'fa fa-pencil',
          'class' => 'table-action edit',
          'function' => false,
        ],
        [
          'route' => 'deletar-motorista.index',
          'icon' => 'fa fa-trash',
          'class' => 'table-action delete',
          'function' => false,
        ]
      ],
      'data' => [
        1 => [
          'nome' => 'Henrique Bruno Oliveira',
          'empresa' => 'Autônomo',
          'cidade' => 'São José dos Campos - SP',
          'status' => 1,
        ],
        2 => [
          'razao_social' => 'Henrique Bruno Oliveira',
          'empresa' => 'Autônomo',
          'cidade' => 'São José dos Campos - SP',
          'status' => 0,
        ],
      ],
    ],
  ];*/
@endphp

@extends('layouts.user_type.auth')

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
                  <h6>{{ $data['page_info']['title'] }}</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
              <!-- BOTÃO CADASTRAR -->
              @if ( $data['page_info']['button_top']) 
                <div class="col-md-6 text-end">
                  <div class="card-header pb-0">
                    <a href="#" class="btn bg-gradient-info mt-4 mb-0">+ Cadastrar Cliente</a>
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
              @if ( $data['page_info']['search'] ) 
                <div class="col-md-6 text-end">
                  <div class="card-header pb-0">
                    <input class="form-control" type="text" placeholder="{{ $data['page_info']['search']['placeholder'] }}" id="{{ $data['page_info']['search']['id'] }}" name="{{ $data['page_info']['search']['name'] }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
              @endif
              
              <!-- FIM SEARCH -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <!-- TOPO TABELA -->
                  <thead>
                    <tr>
                      @foreach($data['table']['header'] as $header)
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $header }}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <!-- FIM TOPO TABELA -->
                  <!-- REGISTROS TABELA -->
                  <tbody>
                    @foreach($data['table']['data'] as $client)
                      <tr>
                        @foreach($client as $key => $clientInfos)
                          @if ($key === 'status') 
                            <td class="ps-4"><span class="ball {{ ($clientInfos) ? 'active' : 'inactive' }}"></span></td>                             
                          @else
                            <td><h6 class="mb-0 text-sm">{{ $clientInfos }}</h6></td>
                          @endif
                        @endforeach
                        @if ($data['table']['botoes'])
                          <td>
                            @foreach($data['table']['botoes'] as $botao)
                              <a href="" class="text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
                              </a>
                            @endforeach
                          <td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                  <!-- FIM REGISTROS TABELA -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @endsection
