<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarPaginaDupla
{

  public function montarPaginaDupla($tipo)
  {
    return match ($tipo) {
      'especializacao' => $this->montarEspecializacao(),
    };
  }

  public function montarEspecializacao()
  {
    $infoLeft = collect([
      'title' => 'Cadastrar especialização',
      'fields' => collect(['Nome da especialização', 'Name in English', 'Descrição']),
      'select' => 'especializacoes',
    ]);


    $infoRight = collect([
      'title' => 'Especializações',
      'head' => collect(['Nome', 'Descrição', 'Motorista', 'Ações']),
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
