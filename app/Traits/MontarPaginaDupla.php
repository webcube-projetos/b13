<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarPaginaDupla
{

  public function montarPaginaDupla($tipo)
  {
    return match ($tipo) {
      'especializacao' => $this->montarEspecializacao(),
      'adicionais' => $this->montarAdicionais(),
      'categorias' => $this->montarCategorias(),
      'categorias-servicos' => $this->montarCategoriasServicos(),
      'procedimentos' => $this->montarProcedimentos(),
    };
  }

  public function montarEspecializacao()
  {
    $infoLeft = collect([
      'title' => 'Cadastrar especialização',
      'fields' => collect(['Nome da especialização', 'Name in English', 'Descrição']),
      'select' => 'especializacoes',
    ]);

    $buttons = [
      'editar' => [
        'title' => 'Editar',
        'route' => 'editar',
        'icon' => 'fa fa-pencil',
        'onClick' => 'editDoublePage(event)',
        'class' => '',
      ],
      'delete' => [
        'title' => 'Deletar',
        'route' => 'delete',
        'icon' => 'fa fa-trash',
        'onClick' => 'deletar(this)',
        'class' => '',
      ],
    ];

    $infoRight = collect([
      'title' => 'Especializações',
      'head' => collect(['Nome', 'Nome em inglês', 'Descrição', 'Motoristas', 'Ações']),
      'actions' => $buttons,
    ]);

    return ['infoLeft' => $infoLeft, 'infoRight' => $infoRight];
  }

  public function montarAdicionais()
  {
    $infoLeft = collect([
      'title' => 'Cadastrar Adicional',
      'fields' => collect(['Nome do adicional', 'Name in English', 'Descrição']),
    ]);


    $infoRight = collect([
      'title' => 'Adicionais',
      'head' => collect(['Nome', 'Descrição', 'Veiculos', 'Ações']),
      'actions' => $this->botoes(['editar', 'delete']),
    ]);

    return ['infoLeft' => $infoLeft, 'infoRight' => $infoRight];
  }

  public function montarCategorias()
  {
    $infoLeft = collect([
      'title' => 'Cadastrar Categoria',
      'fields' => collect(['Nome da categoria', 'Name in English', 'Descrição']),
    ]);

    $buttons = [
      'editar' => [
        'title' => 'Editar',
        'route' => 'editar',
        'icon' => 'fa fa-pencil',
        'onClick' => 'editDoublePage(this)',
        'class' => '',
      ],
      'delete' => [
        'title' => 'Deletar',
        'route' => 'delete',
        'icon' => 'fa fa-trash',
        'onClick' => 'deletar(this)',
        'class' => '',
      ],
    ];

    $infoRight = collect([
      'title' => 'Categorias',
      'head' => collect(['Nome', 'Descrição', 'Veiculos', 'Ações']),
      'actions' => $buttons,
    ]);

    return ['infoLeft' => $infoLeft, 'infoRight' => $infoRight];
  }

  public function montarCategoriasServicos()
  {
    $infoLeft = collect([
      'title' => 'Categoria de Serviços',
      'fields' => collect(['Nome da categoria', 'Name in English']),
    ]);

    $infoRight = collect([
      'title' => 'Categorias',
      'head' => collect(['Nome', 'Serviços', 'Ações']),
      'actions' => $this->botoes(['editar', 'delete']),
    ]);

    return ['infoLeft' => $infoLeft, 'infoRight' => $infoRight];
  }

  public function montarProcedimentos()
  {
    $infoLeft = false;

    $infoRight = collect([
      'title' => 'Procedimentos',
      'head' => collect(['Nome', 'Ações']),
      'actions' => $this->botoes(['editar', 'delete']),
    ]);

    return ['infoLeft' => $infoLeft, 'infoRight' => $infoRight];
  }


  public function botoes(array $botoes)
  {
    $buttons = [
      'editar' => [
        'title' => 'Editar',
        'route' => 'editar',
        'icon' => 'fa fa-pencil',
        'onClick' => false,
        'class' => '',
      ],
      'delete' => [
        'title' => 'Deletar',
        'route' => 'delete',
        'icon' => 'fa fa-trash',
        'onClick' => 'deletar(this)',
        'class' => '',
      ],
    ];

    $result = collect($botoes)->map(function ($button) use ($buttons) {
      return $buttons[$button] ?? null;
    })->filter();

    return $result->toArray();
  }
}
