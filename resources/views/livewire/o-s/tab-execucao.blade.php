<div class="row linha-add position-relative" x-data="{ showFilters: false}">
    <div class="col-12">
        <div class="row align-items-center">
            {{-- <div class="col-12 text-end">
                <a href="#" class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar rota</a>
            </div> --}}

            <div class="col-12">
                <button x-on:click="$event.preventDefault(); showFilters = !showFilters" class="tw-px-[16px] btn bg-dark mt-4 mb-0 text-white tw-w-[150px]"><i class="fa fa-bars"></i> FILTROS</button>
        
                <div x-transition x-show="showFilters" class="filtros tw-flex tw-justify-start tw-mt-[16px] tw-w-full tw-gap-[16px] tw-mx-auto">
                    <input type="date" name="data" wire:model.live="dataPesquisa" class="form-control d-block tw-w-[25%]" >
                    <div class="tw-w-[25%]">
                        <livewire:select-component 
                            type="employee_driver" 
                            placeholder="Selecione o motorista"
                            name="employee_driver" 
                            filterByTypeId=''
                            targetClass="{{$targetClass}}"
                            selected="" 
                        />
                    </div>
                    <div class="tw-w-[25%]">
                        <livewire:select-component 
                            type="vehicles_plate" 
                            placeholder="Selecione o modelo do veículo" 
                            name="vehicleModel[]" 
                            id="vehicleModel" 
                            filterByTypeId=''
                            targetClass="{{$targetClass}}"
                            selected="" 
                        />
                    </div>
                    <div class="tw-w-[25%]">
                        <livewire:select-component 
                            type="empresas" 
                            placeholder="Selecione a empresa" 
                            name="empresas[]" 
                            id="empresas" 
                            filterByTypeId=''
                            targetClass="{{$targetClass}}"
                            selected="" 
                        />
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped !tw-mt-[12px]">
                <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Veículo</th>
                        <th scope="col">Motorista</th>
                        <th scope="col">Início</th>
                        <th scope="col">Término</th>
                        <th scope="col">Execdias</th>
                        <th scope="col">KM Inicial</th>
                        <th scope="col">KM Final</th>
                        <th scope="col">KM Percorridos</th>
                        <th scope="col">KM Excedidos</th>
                        <th scope="col">Pedágio</th>
                        <th scope="col">Estacionamento</th>
                        <th scope="col">Outras Despesas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $day = 0; ?>
                    @foreach($execucoes->groupBy('date') as $datas)
                        <?php $day++; ?>
                        @foreach($datas as $execucao)
                            <livewire:o-s.linhas-execucao 
                                :execucao="$execucao" 
                                :day="$day" 
                                wire:key="{{$execucao->id}}"
                            >
                        @endforeach
                    @endforeach
  
                </tbody>
            </table>
        </div>
    </div>
</div>  
