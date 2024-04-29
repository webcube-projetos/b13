<table class="table align-items-center mb-0 mt-0">
  <!-- TOPO TABELA -->
  <thead>
    <tr>
      @foreach($config['infoRight']['head'] as $key => $item)
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7{{ $loop->last ? ' text-right' : '' }}">
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
          @foreach($itens?->toArray() as $column => $dado)
            @if(!in_array($column, ['children', 'id', 'id_ascendent']))
              <td><h6 class="mb-0 text-sm">{{ $dado ?? '' }}</h6></td>
            @endif

          @endforeach
          <td class="text-right">
              @foreach($config['infoRight']['actions'] as $botao)
                @if ($botao['onClick'])
                  <button 
                      class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                      data-toggle="tooltip" 
                      data-original-title="{{ $botao['title'] ?? ''}}"
                      data-id="{{ $itens->id }}"
                      data-route="{{ route($prefix.'.'.$botao['route']) ?? '' }}"
                      @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                    >
                      <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
                  </button>
                  @elseif ($botao['route'])
                  <a 
                    href="{{ route($prefix.'.'.$botao['route'], ['id' => $itens->id]) }}"
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
      @isset($itens['children'])
        @forelse($itens['children'] as $itensChild)
          <tr>
            @foreach($itensChild->toArray() as $column => $dado)
              @if(!in_array($column, ['id', 'id_ascendent']))

                @if ($column == 'name')
                  <td><h6 class="mb-0 text-sm">- {{ $dado ?? '' }}</h6></td>
                @else
                  <td><h6 class="mb-0 text-sm">{{ $dado ?? '' }}</h6></td>
                @endif
              @endif
            @endforeach
              <td class="text-right">
                  @foreach($config['infoRight']['actions'] as $botao)
                    @if ($botao['onClick'])
                      <button 
                          class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                          data-toggle="tooltip" 
                          data-original-title="{{ $botao['title'] ?? ''}}"
                          data-id="{{ $itensChild->id }}"
                          data-route="{{ route($prefix.'.'.$botao['route']) ?? '' }}"
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

        @empty
        @endforelse
      @endisset
    @endforeach
</tbody>

  <!-- FIM REGISTROS TABELA -->
</table>

{{ $lista->links('components.paginacaoAjax') }}
