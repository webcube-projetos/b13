<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarPagina
{
  //Isso tudo da pra deixar bem melhor, só uma ideia de como fazer isso
  //Estou chamando montarPagina nas principais, mas daria pra chamar direto o metodo
  public function montarPagina($tipo)
  {
    return match ($tipo) {
      'cliente' => $this->montarCliente(),
      'empresas' => $this->montarEmpresas(),
      'veiculos' => $this->montarVeiculos(),
      'motoristas' => $this->montarMotoristas(),
      'segurancas' => $this->montarSegurancas(),
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

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os clientes',
      'buttonTop' => true,
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
      'title' => 'Todos as Empresas',
      'buttonTop' => true,
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

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Veiculos',
      'buttonTop' => true,
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Tipo do Veiculo', 'MARCA', 'Modelo', 'Ano', 'Blindado', 'Placa', 'Adicionais', 'Ações']);

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

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Motoristas',
      'buttonTop' => true,
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

    $actions = collect([
      $editar,
      $deletar,
    ]);

    $config = new Fluent([
      'title' => 'Todos os Segurancas',
      'buttonTop' => true,
      'search' => $search,
      'actions' => $actions,
    ]);

    $header = collect(['Nome', 'Empresa', 'Cidade', 'Status', 'Ações']);


    return [$config, $header];
  }
}
