<div class="cadastro-contatos mt-3">
    <div class="row align-items-center">
        <div class="col-lg-6 text-lg-start text-center">
            <h6 class="fw-bold">Cadastrar especializações</h6>
        </div>
        <div class="col-lg-6 text-lg-end text-center">
            <a href="javascript:;" id="addLinhaEspecializacao" class="btn bg-gradient-dark btn-md mt-4 mb-4">+ Cadastrar especialização</a>
        </div>
        <div class="cadastrados">
            @if(isset($employee))
                @foreach ($employee->specializations as  $item)
                    <div class="item mb-1">
                        <span class="badge bg-secondary d-flex align-items- justify-content-between px-2 gap-2" style="max-width: max-content">
                            {{ $item->name }} 
                            <button class="btnDeleteESP"><i class="bi bi-x"></i></button>
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
        <div id="box-linhas-especializacao">
            
        </div>
    </div>
</div>