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
        <button class="button-actions text-secondary font-weight-bold text-xs me-2">
          <i class="fa fa-pencil"></i>
        </button>
        <button class="button-actions text-secondary font-weight-bold text-xs me-2" wire:click="deleteModal({{ $os->id }})">
          <i class="fa fa-trash"></i>
        </button>
        <button class="button-actions text-secondary font-weight-bold text-xs me-2">
          <i class="fa fa-clone"></i>
        </button>
      </td>
    </tr>
    @endforeach
</tbody>

</table>

{{-- {{ $dados->links('components.paginacaoAjax') }} --}}
