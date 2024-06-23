<div class="row w-100">
    <div class="col-md-6">
        <select class="dinamicSelect form-control" name="client_id" wire:model.live="selectedPrimary">
            <option value="" selected >Selecione o Cliente</option>
            @foreach ($clients as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <select class="dinamicSelect form-control" name="contact_id" wire:model.live="contato">
            <option value="" selected >Selecione o Contato</option>
            @if(($contacts && $contacts->count()))                
                @foreach ($contacts as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

</div>