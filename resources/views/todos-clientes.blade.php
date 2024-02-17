@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tod</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Razão Social</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apelido</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cidade</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">País</th>
                      <th class="text-secondary opacity-7">#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Portimus Auto Center LTDA.</h6>
                            <p class="text-xs text-secondary mb-0">Portimus Mecânica Automotiva</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">Alex Portimus</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">São José dos Campos - SP</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">Brasil</h6>
                      </td>
                      <td>
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-2 table-action edit" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs table-action delete" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @endsection
