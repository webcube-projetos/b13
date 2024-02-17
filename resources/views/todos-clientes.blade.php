@php
  $data = [
    'page_info' => [
      'title' => 'Todos os clientes',
      'button_top' => [
        'name' => '+ Cadastrar Cliente',
        'route' => 'cadastrar-cliente.index',
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

  $data2 = [
    'page_info' => [
      'title' => 'Todos os motoristas',
      'button_top' => [
        'name' => '+ Cadastrar Motorista',
        'route' => 'cadastrar-motorista.index',
      ],
      'search' => [
        'id' => 'search',
        'name' => 'search',
        'placeholder' => 'Pesquisar por Nome/Apelido',
      ],
    ],
    'table' => [
      'header' => [
        'Nome',
        'Empresa',
        'Cidade',
        'Estado',
        'Status',
        'Ações',
      ],
      'data' => [
        'nome' => 'Henrique Bruno Oliveira',
        'empresa' => 'Autônomo',
        'cidade' => 'São José dos Campos',
        'estado' => 'SP',
        'status' => 'Ativo',
        'botoes' => [
          'id' => 1,
          'cadastrar-motorista',
          'editar-motorista',
        ]
      ]
    ]
  ];
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
              <div class="col-lg-6">
                <div class="card-header pb-0">
                  <h6>Todos os clientes</h6>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
              <!-- BOTÃO CADASTRAR -->
              <div class="col-lg-6 text-end">
                <div class="card-header pb-0">
                  <a href="#" class="btn bg-gradient-info mt-4 mb-0">+ Cadastrar Cliente</a>
                </div>
              </div>
              <!-- FIM BOTÃO CADASTRAR -->
              <div class="col-lg-6">
                <div class="card-header pb-0 pt-0">
                  <a href="#" class="btn bg-dark mt-4 mb-0 text-white"><i class="fa fa-bars"></i> FILTROS</a>
                </div>
              </div>
              <!-- FIM TÍTULO TABELA -->
              <!-- BOTÃO CADASTRAR -->
              <div class="col-lg-6 text-end">
                <div class="card-header pb-0">
                  <input class="form-control" type="text" placeholder="Pesquisar por Razão/Apelido" id="search" name="search" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
              <!-- FIM BOTÃO CADASTRAR -->
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
                    @foreach($data['table']['data'] as $key => $client)
                      <tr>
                        <td><h6 class="mb-0 text-sm">{{ $client['razao_social'] }}</h6></td>
                        <td><h6 class="mb-0 text-sm">{{ $client['apelido'] }}</h6></td>
                        <td><h6 class="mb-0 text-sm">{{ $client['cidade'] }}</h6></td>
                        <td><h6 class="mb-0 text-sm">{{ $client['pais'] }}</h6></td>
                        <td>
                        @foreach($data['table']['botoes'] as $botao)
                          <a href="" class="text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" data-toggle="tooltip" data-original-title="Edit user">
                            <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
                          </a>
                        @endforeach
                        <td>
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
