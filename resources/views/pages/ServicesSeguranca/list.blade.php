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
          {{$service->categoryService->name}}
        </td>
        <td>
          {{$service->categoryEspec->name}}
        </td>
        <td>
          {{$service->name}}
        </td>
        <td>
          {{ $service->blindado_armado ? 'Sim' : 'Não' }}
        </td>
        <td>
          {{ $service->bilingual ? 'Sim' : 'Não' }}
        </td>
        <td>
          {{ $service->driver ? 'Sim' : 'Não' }}
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
  
  {{ $dados->links('components.paginacaoAjax') }}
  