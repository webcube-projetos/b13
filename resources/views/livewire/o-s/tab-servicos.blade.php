
<div class="linha-add row align-items-center pt-4">
    <div class="col-lg-6">
        <h3 class="h3">Lista Serviços</h3>
    </div>
    <div class="col-lg-6 text-end">
        <div class="btn-group dropup">
            <button type="button" class="btn bg-gradient-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                + Adicionar Serviço
            </button>
            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                <li><a wire:click="addLinhaServicoLocacao">+ Locação</a></li>
                <li><a wire:click="addLinhaServicoSeguranca">+ Segurança</a></li>
            </ul>
        </div>
    </div>

    <div id="box-linhas-servico-os">
        <div>
            @foreach ($servicesOS as $service)
                <livewire:o-s.services 
                    wire:key="{{ $service['id']}}" 
                    :serviceId="$service['id']" 
                    :type="$service['type']" 
                    :data="$service['data'] ?? null" 
                />
            @endforeach
        </div>
    
    </div>
</div>
