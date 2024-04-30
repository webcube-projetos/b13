<div class="row">
    <div class="col-md-12">
        <select class="dinamicSelect form-control" name="id_aditional[]" wire:model.live="selectedPrimary">
            <option value="" selected >Selecione adicional</option>
            @foreach ($primary as $option)
                <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
    </div>
</div>