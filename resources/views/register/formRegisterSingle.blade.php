<form action="{{ route($dados['pageInfo']['form_action']) ?? '' }}" method="{{ $dados['pageInfo']['form_method'] ?? 'POST' }}" role="form text-left" id="{{$dados['pageInfo']['id']}}">
  @csrf
  <input type="hidden" name="id" value="{{ $dados['pageInfo']['value']?->id ?? '' }}">
  @foreach ($dados['sessions'] as $key => $group)
    @include('register.formRegister')
  @endforeach

  <div class="d-flex justify-content-end">
      <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
  </div>
  
</form> 