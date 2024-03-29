<div class="cadastro-contatos mt-3">
    <div class="row align-items-center">
        <div class="col-lg-6 text-lg-start text-center">
            <h6 class="fw-bold">Cadastrar contatos</h6>
        </div>
        <div class="col-lg-6 text-lg-end text-center">
            <a href="javascript:;" id="addLinhaContato" class="btn bg-gradient-dark btn-md mt-4 mb-4">+ Cadastrar Contato</a>
        </div>

        <div id="box-linhas-contato">
            @forelse($dados['pageInfo']['value']->contacts as $item)
                @include('components.row-contact')
            @empty
            @endforelse
        </div>
    </div>
</div>