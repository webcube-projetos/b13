<div x-data="{ showFilters: false }">
    <div class="row">
        <div class="col-md-6">
            <div class="card-header pb-0 pt-0">
                <button x-on:click="showFilters = !showFilters" class="btn bg-dark mt-4 mb-0 text-white"><i class="fa fa-bars"></i> FILTROS</button>
            </div>
        </div>

        @if ( $config['search'] ) 
          <div class="col-md-6 text-end">
            <div class="card-header pb-0">
              <input type="text" class="form-control" wire:model.live="search" placeholder="Empresa...">
            </div>
          </div>
        @endif

        <div x-transition x-show="showFilters" class="filtros tw-flex tw-px-4 tw-justify-between tw-mt-[16px] tw-w-full tw-px-[32px] tw-gap-[16px] tw-mx-auto">
            <input type="date" name="data" wire:model.live="data" class="form-control d-block tw-w-[50%]" >
            <input placeholder="Contato" type="text" name="contato" wire:model.live="contato" class="form-control d-block tw-w-[50%]" >
        </div>
        
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0" id="tableList">
            @include('pages.OS.list')
        </div>
      </div>
    
</div>
