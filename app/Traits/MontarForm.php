<?php

namespace App\Traits;

use Illuminate\Support\Fluent;

trait MontarForm
{
    public function montarForm($tipo, $dado = null)
    {
        return match ($tipo) {
            'cliente' => $this->montarFormCliente($dado),
            'empersa' => $this->montarFormEmpresa($dado),
        };
    }

    private function montarFormCliente($dado = null)
    {
        $data = new Fluent([
            'pageInfo' => [
                'title' => $dado ? 'Editar cliente' : 'Cadastrar cliente',
                'form_action' => '',
                'form_method' => '',
                'label_button' => $dado ? 'Editar cliente' : 'Cadastrar cliente',
                //Aqui a ideia é passar um array com todos os dados bancários e montar ele no formBank
                'dados_bancarios' => $dado['dados_bancarios'] ?? true,
                'cadastro_contatos' => true,
                'cadastro_adicionais' => false,
                'cadastro_especializacoes' => false,
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
                        'dado' => $dado['cpf'] ?? null,
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
                        'dado' => $dado['apelido'] ?? null,
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
                        'dado' => $dado['razao_social'] ?? null,
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
                        'dado' => $dado['nome_fantasia'] ?? null,
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
                            'name' => 'pesquisaCep(this.value)',
                        ],
                        'dado' => $dado['cep'] ?? null,
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
                        'dado' => $dado['logradouro'] ?? null,
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
                        'dado' => $dado['numero'] ?? null,
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
                        'dado' => $dado['bairro'] ?? null,
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
                        'dado' => $dado['cidade'] ?? null,
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
                        'dado' => $dado['estado'] ?? null,
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
                        'dado' => $dado['pais'] ?? null,
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

    private function montarFormEmpresa($dado = null)
    {
        $data = new Fluent([
            'pageInfo' => [
                'title' => $dado ? 'Editar empresa' : 'Cadastrar empresa',
                'form_action' => '',
                'form_method' => '',
                'label_button' => $dado ? 'Editar empresa' : 'Cadastrar empresa',
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
                        'dado' => $dado['cpf'] ?? null,
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
                        'dado' => $dado['apelido'] ?? null,
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
                        'dado' => $dado['razao_social'] ?? null,
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
                        'dado' => $dado['nome_fantasia'] ?? null,
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
                            'type' => 'onChange',
                            'name' => 'pesquisaCep()',
                        ],
                        'dado' => $dado['cep'] ?? null,
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
                        'dado' => $dado['logradouro'] ?? null,
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
                        'dado' => $dado['numero'] ?? null,
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
                        'dado' => $dado['bairro'] ?? null,
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
                        'dado' => $dado['cidade'] ?? null,
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
                        'dado' => $dado['estado'] ?? null,
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
                        'dado' => $dado['pais'] ?? null,
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
