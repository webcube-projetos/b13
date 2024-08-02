<div class="cadastro-contatos mt-3">
    <div class="row align-items-center">
        <div class="col-lg-6 text-lg-start text-center">
            <h6 class="fw-bold">Dados de serviço</h6>
        </div>
        <div class="col-lg-6 text-lg-end text-center">
            <div class="btn-group dropup mt-7">
                <button type="button" class="btn bg-gradient-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    + Adicionar Serviço
                </button>
                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                    <li><a wire:click="addLinhaServico">+ Locação</a></li>
                    <li><a wire:click="addLinhaServico">+ Segurança</a></li>
                </ul>
            </div>
        </div>

        <div id="box-linhas-servico-os">
            <div>
                @foreach ($servicesOS as $service)
                    <livewire:o-s.services 
                        wire:key="{{ $service['id'] }}" 
                        :serviceId="$service['id']" 
                        :type="$service['type']" 
                        :data="$service['data'] ?? null" 
                    />
                @endforeach
            </div>
        
        </div>
    </div>
</div>