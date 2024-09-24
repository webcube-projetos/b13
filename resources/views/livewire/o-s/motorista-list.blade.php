<div class="tw-flex tw-flex-wrap align-items-center">
    <div class="tw-w-full">
        <div class="row align-items-center justify-content-end">
            <div class="text-end">
                <button wire:click="addLinhaVM" type="button" x-on:click="$event.preventDefault()"  class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar linha</button>
            </div>
        </div>
    </div>
    <div class="tw-w-full">
        @foreach($motoristas as $motorista)
            <livewire:o-s.motorista-item :motorista="$motorista" wire:key="{{$motorista['id']}}" />
        @endforeach
    </div>
</div>