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
    @foreach($dados as $service)

      <td>
        {{$service->categoryEspec->name}}
      </td>
      <td>
        {{$service->categoryService->name}}
      </td>
      <td>
        {{$service->name}}
      </td>
      <td>
        {{ optional($service->vehicleType)->name ?? '-' }}
      </td>
      <td>
        {{ $service->blindado_armado ? 'Sim' : 'Não' }}
      </td>
      <td>
        {{ $service->bilingual ? 'Sim' : 'Não' }}
      </td>
      <td>
        R$ {{ number_format($service->price, 2, ',', '.') }}
      </td>

      <td class="text-right">
          @foreach($config->actions as $botao)
            @if (isset($botao['onClick']) && $botao['onClick'])
              <button 
                  class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                  data-toggle="tooltip" 
                  data-id="{{ $service->id }}"
                  data-route="{{ route($botao['route']) ?? '' }}"
                  data-original-title="{{ $botao['title'] ?? ''}}"
                  @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                >
                  <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
              </button>
              @elseif (isset($botao['route']))
              <a 
                href="{{ route($botao['route'], ['servicos' => $service->id]) }}"
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
                data-id="{{ $service->id }}"
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
