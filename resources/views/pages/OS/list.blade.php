<table class="table align-items-center mb-0">
  <thead>
    <tr>
      @foreach($header as $key => $item)
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7{{ $loop->last ? ' text-center' : '' }}">
              {{ $item }}
          </th>
      @endforeach
  
    </tr>
  </thead>
  <tbody>
    @foreach($dados as $os)
    <tr>
      <td>
        {{$os->id}}
      </td>
      <td>
        {{$os->created_at->format('d/m/Y')}}
      </td>
      <td>
        {{$os->client->name}}
      </td>
      <td>
        {{$os->contact->name}}
      </td>
      <td>
        {{-- formatar para preço brasil --}}
        R$ {{ number_format($os->services->sum('price'), 2, ',', '.') }}
      </td>
      <td class="text-right">
          @foreach($config['actions'] as $botao)
            @if (isset($botao['onClick']) && $botao['onClick'])
              <button 
                  class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                  data-toggle="tooltip" 
                  data-id="{{ $os->id }}"
                  data-original-title="{{ $botao['title'] ?? ''}}"
                  @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
                >
                  <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
              </button>
              @elseif (isset($botao['route']))
              <button 
                class="button-actions text-secondary font-weight-bold text-xs me-2 {{ $botao['class'] }}" 
                data-toggle="tooltip" 
                data-original-title="{{ $botao['title'] ?? ''}}"
                @if($botao['onClick']) onclick="{{ $botao['onClick'] }}" @endif
              >
                <i class="{{ $botao['icon'] }}" aria-hidden="true"></i>
            </button>
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

</table>

{{-- {{ $dados->links('components.paginacaoAjax') }} --}}
