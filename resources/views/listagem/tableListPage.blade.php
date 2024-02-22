<table class="table align-items-center mb-0 mt-0">
  <!-- TOPO TABELA -->
  <thead>
    <tr>
      @foreach($config['infoRight']['head'] as $key => $item)
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7{{ $loop->last ? ' text-center' : '' }}">
              {{ $item }}
          </th>
      @endforeach
  
    </tr>
  </thead>
  <!-- FIM TOPO TABELA -->
  <!-- REGISTROS TABELA -->
  <tbody>
    @foreach($lista as $itens)
    <tr>
        @foreach($itens as $coluna => $dado)
            @if($coluna !== 'ascendente')
            <td><h6 class="mb-0 text-sm">{{ $dado }}</h6></td>
            @endif
        @endforeach
        <td class="text-right">
            @foreach($config['infoRight']['actions'] as $botao)
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
                  href="{{ route($prefix.'.'.$botao['route']) }}"
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

{{ $lista->links('components.paginacaoAjax') }}
