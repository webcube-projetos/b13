<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarPagina
{
  public function montarPagina($tipo)
  {
    return match ($tipo) {
      'cliente' => $this->montarCliente(),
      'empresas' => $this->montarEmpresas(),
      'veiculos' => $this->montarVeiculos(),
      'motoristas' => $this->montarMotoristas(),
      'segurancas' => $this->montarSegurancas(),
      'servicosSeguranca' => $this->montarServicosSeguranca(),
      'servicosLocacao' => $this->montarServicosLocacao(),
      'financeiro' => $this->montarFinanceiro(),
      'orcamento' => $this->montarOrcamento(),
      'os' => $this->montarOs(),
    };
  }

  private function montarCliente()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Razão/Apelido',
      'route' => 'pesquisar.clientes',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'clientes.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'clientes.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os clientes',
      'button_top' => [
        'name' => '+ Cadastrar clientes',
        'route' => 'clientes.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Razão Social', 'Apelido', 'Cidade', 'País', 'Ações']);


    return [$config, $header];
  }

  private function montarEmpresas()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Razão/Apelido',
      'route' => 'pesquisar.empresas',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'route' => 'empresas.editar',
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'empresas.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos as Empresas',
      'button_top' => [
        'name' => '+ Cadastrar empresas',
        'route' => 'empresas.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Razão Social', 'Apelido', 'Cidade', 'País', 'Ações']);


    return [$config, $header];
  }

  private function montarVeiculos()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Modelo/Tipo',
      'route' => 'pesquisar.veiculos',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'veiculos.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'veiculos.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Veiculos',
      'button_top' => [
        'name' => '+ Cadastrar veículos',
        'route' => 'veiculos.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Tipo do Veiculo', 'Marca', 'Modelo', 'Ano', 'Blindado', 'Placa', 'Adicionais', 'Ações']);

    return [$config, $header];
  }

  private function montarMotoristas()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.motoristas',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'motoristas.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'motoristas.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Motoristas',
      'button_top' => [
        'name' => '+ Cadastrar motorista',
        'route' => 'motoristas.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Nome', 'Empresa', 'Cidade', 'Status', 'Ações']);


    return [$config, $header];
  }

  private function montarSegurancas()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.segurancas',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'segurancas.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'segurancas.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Segurancas',
      'button_top' => [
        'name' => '+ Cadastrar seguranças',
        'route' => 'segurancas.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Nome', 'Empresa', 'Cidade', 'Armado', 'Motorista', 'Status', 'Ações']);


    return [$config, $header];
  }

  private function montarServicosLocacao()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.servicos',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'servicos.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'servicos.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);


    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Serviços',
      'button_top' => [
        'name' => '+ Cadastrar serviços',
        'route' => 'servicos.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Categoria', 'Tipo', 'Nome', 'Veículo', 'Blindado', 'Bilingue', 'Preço Base', 'Ações']);


    return [$config, $header];
  }

  private function montarServicosSeguranca()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.servicos',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $editar = collect([
      'title' => 'Editar',
      'route' => 'servicos.seguranca.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => false,
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'servicos.seguranca.delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(event)',
      'class' => '',
    ]);


    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Serviços',
      'button_top' => [
        'name' => '+ Cadastrar serviços',
        'route' => 'servicos.seguranca.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Serviço', 'Tipo', 'Nome', 'Armado', 'Bilingue', 'Motorista', 'Preço Base', 'Ações']);


    return [$config, $header];
  }

  private function montarFinanceiro()
  {
    $search = new Fluent([
      'placeholder' => 'Pesquisar por Empresa',
      'route' => 'pesquisar.financeiro',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ]);

    $modal = collect([
      'name' => 'modal',
      'target' => 'financeiroModal',
      'icon' => 'fa fa-eye',
      'class' => '',
    ]);

    $actions = collect([
      $modal,
    ]);

    $config = new Fluent([
      'title' => 'Todos os lançamentos',
      'button_top' => false,
      'search' => $search,
      'actions' => $actions,
      'modal' => true
    ]);

    $header = collect(['Tipo', 'Data Prevista', 'Empresa', 'Apelido', 'Valor', 'Status', 'Ações']);


    return [$config, $header];
  }

  private function montarOrcamento()
  {
    $search = [
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.orcamento',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ];

    $editar = collect([
      'title' => 'Editar',
      'route' => 'editar',
      'icon' => 'fa fa-pencil',
      'onClick' => 'editar(this)',
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(this)',
      'class' => '',
    ]);

    $duplicar = collect([
      'title' => 'Duplicar',
      'route' => 'duplicar',
      'icon' => 'fa fa-clone',
      'onClick' => 'duplicar(this)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
      $duplicar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os orçamentos',
      'button_top' => [
        'name' => '+ Cadastrar orçamento',
        'route' => 'orcamentos.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['#', 'Data abertura', 'Empresa', 'Apelido', 'Valor', 'Ações']);


    return [$config, $header];
  }

  private function montarOs()
  {
    $search = [
      'placeholder' => 'Pesquisar por Nome',
      'route' => 'pesquisar.servicos',
      'label' => false,
      'name' => 'search',
      'id' => 'search',
    ];

    $editar = collect([
      'title' => 'Editar',
      'route' => 'os.editar',
      'icon' => 'fa fa-pencil',
      'onClick' => 'editar(this)',
      'class' => '',
    ]);

    $deletar = collect([
      'title' => 'Deletar',
      'route' => 'delete',
      'icon' => 'fa fa-trash',
      'onClick' => 'deletar(this)',
      'class' => '',
    ]);

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todas as O.S',
      'button_top' => [
        'name' => '+ Cadastrar OS',
        'route' => 'os.cadastro',
      ],
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['#', 'Data abertura', 'Empresa', 'Apelido', 'Valor', 'Ações']);


    return [$config, $header];
  }
}
