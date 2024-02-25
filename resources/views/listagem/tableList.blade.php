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
    @foreach($dados as $itens)
    <tr class="@if(isset($itens['status']) &&$itens['status'] == 0) inactive @endif">
        @foreach($itens as $coluna => $dado)
            @if ($coluna === 'status') 
                <td class="ps-4">
                    <span class="ball {{ ($dado) ? 'active' : 'inactive' }}"></span>
                </td>
            @elseif($coluna === 'pessoa-foto')
            <td>
              <div class="d-flex align-items-center">
                <div>
                  <img src="{{ $dado['foto'] }}" class="avatar avatar-sm me-3">
                </div>
                <div>
                  <h6 class="mb-0 text-sm">{{ $dado['nome'] }}</h6>
                </div>
              </div>
          </td>
            @elseif($coluna === 'adicionais')   
              <td class="text-center">
                <button 
                  class="btn-adicional"
                  data-bs-toggle="tooltip" 
                  data-bs-placement="top"
                  data-bs-custom-class="custom-tooltip"
                  data-bs-title="{{ $dado }}"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
                </button>
              </td>                        
            @else
                @php 
                  if(is_bool($dado)) {
                      $dado = $dado ? 'Sim' : 'Não';
                  }
                @endphp
                <td class="@if($dado == 'Entrada')text-success @elseif($dado == 'Saida')text-danger @endif"><h6 class="mb-0 text-sm">{{ $dado }}</h6></td>
            @endif
        @endforeach
        <td class="text-right">
            @foreach($config->actions as $botao)
              @if ($botao['onClick'])
                <button 
                    class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                    data-toggle="tooltip" 
                    data-original-title="{{ $botao['title'] ?? ''}}"
                    @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                  >
                    <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
                </button>
                @elseif ($botao['route'])
                <a 
                  href="{{ route($botao['route']) }}"
                  class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                  data-toggle="tooltip" 
                  data-original-title="{{ $botao['title'] ?? ''}}"
                  @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                >
                  <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
              </a>
              @endif
            @endforeach
        </td>
    </tr>
    @endforeach
</tbody>

  <!-- FIM REGISTROS TABELA -->
</table>

{{ $dados->links('components.paginacaoAjax') }}
