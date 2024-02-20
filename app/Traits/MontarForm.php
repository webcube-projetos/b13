<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarForm
{
  public function montarForm($tipo)
  {
    return match ($tipo) {
      'cliente' => $this->montarFormCliente(),
    };
  }

  private function montarFormCliente()
  {
    $data = new Fluent([
        'pageInfo' => [
            'title' => 'Cadastrar cliente',
            'form_action' => '',
            'form_method' => '',
            'label_button' => 'Cadastrar cliente',
        ],
        'sessions' => [
            'Dados da Empresa' => [
                'cpf' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-6',
                    'label' => 'CPF/CNPJ',
                    'type' => 'text',
                    'placeholder' => '00.000.000/0001-00',
                    'maxlength' => 18,
                    'required' => true,
                    'id' => 'cpfcnpj',
                    'name' => 'cpfcnpj',
                    'function' => false,
                ],
                'apelido' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-6',
                    'label' => 'Apelido',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 50,
                    'required' => false,
                    'id' => 'apelido',
                    'name' => 'apelido',
                    'function' => false,
                ],
                'razao_social' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-6',
                    'label' => 'Razão Social',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 70,
                    'required' => true,
                    'id' => 'razao',
                    'name' => 'razao',
                    'function' => false,
                ],
                'nome_fantasia' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-6',
                    'label' => 'Nome Fantasia',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 70,
                    'required' => true,
                    'id' => 'nome_fantasia',
                    'name' => 'nome_fantasia',
                    'function' => false,
                ],
                'cep' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-3',
                    'label' => 'CEP',
                    'type' => 'number',
                    'placeholder' => '00000-000',
                    'maxlength' => 9,
                    'required' => true,
                    'id' => 'cep',
                    'name' => 'cep',
                    'function' => [
                        'type' => 'onblur',
                        'name' => 'pesquisaCep();',
                    ],
                ],
                'logradouro' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-7',
                    'label' => 'Logradouro',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 50,
                    'required' => true,
                    'id' => 'logradouro',
                    'name' => 'logradouro',
                    'function' => false,
                ],
                'numero' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-2',
                    'label' => 'Número',
                    'type' => 'number',
                    'placeholder' => '123',
                    'maxlength' => 10,
                    'required' => true,
                    'id' => 'numero',
                    'name' => 'numero',
                    'function' => false,
                ],
                'bairro' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-4',
                    'label' => 'Bairro',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 30,
                    'required' => true,
                    'id' => 'bairro',
                    'name' => 'bairro',
                    'function' => false,
                ],
                'cidade' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-4',
                    'label' => 'Cidade',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 40,
                    'required' => true,
                    'id' => 'cidade',
                    'name' => 'cidade',
                    'function' => false,
                ],
                'estado' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-2',
                    'label' => 'Estado',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 2,
                    'required' => true,
                    'id' => 'estado',
                    'name' => 'estado',
                    'function' => false,
                ],
                'pais' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-2',
                    'label' => 'País',
                    'type' => 'text',
                    'placeholder' => '',
                    'maxlength' => 15,
                    'required' => true,
                    'placeholder' => '',
                    'id' => 'pais',
                    'name' => 'pais',
                    'function' => false,
                ],
            ],
            'Contatos da Empresa' => [
                'phone' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-4',
                    'label' => 'Telefone empresarial',
                    'type' => 'number',
                    'placeholder' => '(00)0000-00000',
                    'maxlength' => 14,
                    'required' => true,
                    'id' => 'phone',
                    'name' => 'phone',
                    'function' => false,
                ],
                'email' => [
                    'container_tag' => 'div',
                    'container_class' => 'col-md-8',
                    'label' => 'E-mail empresarial',
                    'type' => 'email',
                    'placeholder' => 'contato@b13company.com',
                    'maxlength' => 70,
                    'required' => true,
                    'id' => 'email',
                    'name' => 'email',
                    'function' => false,
                ],
            ],
        ],
    ]);
    return $data;
  }
}
