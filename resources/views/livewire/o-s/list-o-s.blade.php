<div x-data="{ showFilters: false}">
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

      <div x-data="{ dangerModalIsOpen: false, idItem: null }" @modal-delete.window="dangerModalIsOpen = true;">
        <!-- Botão de Ação -->
        <button x-on:click="dangerModalIsOpen = true" class="tw-text-secondary tw-font-bold tw-text-xs tw-me-2">
          <i class="fa fa-trash"></i>
        </button>
      
        <!-- Modal -->
        <div x-cloak x-show="dangerModalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="dangerModalIsOpen" @keydown.esc.window="dangerModalIsOpen = false" x-on:click.self="dangerModalIsOpen = false" class="tw-fixed tw-inset-0 tw-z-[999] tw-flex tw-items-center tw-justify-center tw-bg-black/20 tw-p-4 tw-backdrop-blur-md tw-z-[999]" role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
          <!-- Dialog -->
          <div x-show="dangerModalIsOpen" x-transition:enter="tw-transition tw-ease-out tw-duration-200" x-transition:enter-start="tw-opacity-0 tw-scale-50" x-transition:enter-end="tw-opacity-100 tw-scale-100" class="tw-max-w-lg tw-mx-auto tw-rounded-md tw-bg-white tw-p-4 tw-shadow-lg tw-z-[999]">
            <!-- Header -->
            <div class="tw-flex tw-items-center tw-justify-between tw-border-b tw-border-gray-200 tw-pb-2 tw-mb-2">
              <div class="tw-text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="tw-w-6 tw-h-6">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                </svg>
              </div>
              <button x-on:click="dangerModalIsOpen = false" aria-label="close modal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="tw-w-5 tw-h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Body -->
            <div class="tw-text-center tw-mb-4">
              <h3 id="dangerModalTitle" class="tw-text-lg tw-font-semibold tw-text-gray-900">Deletar OS</h3>
              <p>Você tem certeza que deseja deletar esta OS?</p>
            </div>
            <!-- Footer -->
            <div class="tw-flex tw-justify-center">
              <button x-on:click="dangerModalIsOpen = false;" wire:click="delete" class="tw-bg-red-500 tw-text-white tw-px-4 tw-py-2 tw-rounded-md">Deletar</button>
            </div>
          </div>
        </div>
      </div>
      
    
    
</div>
