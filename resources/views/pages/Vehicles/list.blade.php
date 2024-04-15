<table class="table align-items-center mb-0">
  <!-- TOPO TABELA -->
  <thead>
    <tr>
      @foreach($header as $key => $item)
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7{{ $loop->last ? ' text-center' : '' }}">
              {{ $item }}
          </th>
      @endforeach
  
    </tr>
  </thead>
  <!-- FIM TOPO TABELA -->
  <!-- REGISTROS TABELA -->
  <tbody>
    @foreach($dados as $vehicle)

      <td>
        {{$vehicle->type->name}}
      </td>
      <td>
        {{$vehicle->brand->name}}
      </td>
      <td>
        {{$vehicle->category->name}}
      </td>
      <td>
        {{$vehicle->year}}
      </td>
      <td>
        {{$vehicle->armored ? 'Sim' : 'Não'}}
      </td>
      <td>
        {{$vehicle->plate}}
      </td>
      <td>
        {{$vehicle->year}}
      </td>

      <td class="text-center">
        <button 
          class="btn-adicional"
          data-bs-toggle="tooltip" 
          data-bs-placement="top"
          data-bs-custom-class="custom-tooltip"
          data-bs-title="{{ $vehicle->additionals }}"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
        </button>

      <td class="text-right">
          @foreach($config->actions as $botao)
            @if (isset($botao['onClick']) && $botao['onClick'])
              <button 
                  class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                  data-toggle="tooltip" 
                  data-original-title="{{ $botao['title'] ?? ''}}"
                  @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                >
                  <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
              </button>
              @elseif (isset($botao['route']))
              <a 
                href="{{ route($botao['route'], ['employee' => $employee->id]) }}"
                class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                data-toggle="tooltip" 
                data-original-title="{{ $botao['title'] ?? ''}}"
                @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
              >
                <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
            </a>
            @elseif ($botao['name'] === 'modal')
              <button 
                type="button" 
                class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                data-bs-toggle="modal" 
                data-bs-target="#{{ $botao['target'] }}">
                <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
              </button>
            @endif
          @endforeach
      </td>
    </tr>
    @endforeach
</tbody>

  <!-- FIM REGISTROS TABELA -->
</table>

@if (isset($config['modal']) && $config['modal'])
<div class="modal fade" id="financeiroModal" tabindex="-1" role="dialog" aria-labelledby="financeiroModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title display-inline-block me-4" id="financeiroModalLabel">Informações Transação</h5>
        <span id="os_number">O.S. <span class="font-weight-bold">#0831</span></span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Status de pagamento</h6>
        <select name="status_payment" id="status_payment" class="form-control mb-4">
          <option value="NAO_PAGO">Não pago</option>
          <option value="PAGO">Pago</option>
        </select>

        <div class="divider mb-3">
          <div class="financial-info">
            <p class="font-weight-bold">Tipo:</p>
            <p class="text-danger font-weight-bold">Saída</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Serviço:</p>
            <p class="font-weight-bold">Transfer IN SUV Blindado</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">employeee:</p>
            <p class="font-weight-bold">Netflix</p>
          </div>
          <hr>
        </div>

        <div class="divider mb-3">
          <div class="financial-info">
            <p class="font-weight-bold">Nome:</p>
            <p class="font-weight-bold">Juscelino Alencar</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Banco:</p>
            <p class="font-weight-bold">Itaú</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Agência:</p>
            <p class="font-weight-bold">0001</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Conta:</p>
            <p class="font-weight-bold">012345678-9</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Chave PIX:</p>
            <p class="font-weight-bold">juscelinoalenc.12@gmail.com</p>
          </div>
          <div class="financial-info">
            <p class="font-weight-bold">Prefere receber:</p>
            <p class="font-weight-bold">Via PIX</p>
          </div>

          <div class="financial-info mt-4">
            <p class="font-weight-bold">Valor: </p>
            <p class="font-weight-bold text-success">R$800,00</p>
          </div>
          <hr>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <div>
          <h6 class="mb-0 text-sm">Data prevista:</h6>
          <p class="font-weight-bold">10/04/2024</p>
        </div>
        <button type="button" class="btn bg-gradient-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
@endif

{{ $dados->links('components.paginacaoAjax') }}
