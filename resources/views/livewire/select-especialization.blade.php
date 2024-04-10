<div class="row">
    <div class="@if(!($especializations && $especializations->count())) col-md-12 @else col-md-6 @endif">
        <select class="dinamicSelect form-control" name="id_especialization[]" wire:model.live="selectedPrimary">
            <option value="" selected >Selecione categoria</option>
            @foreach ($primary as $option)
                <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 @if(!($especializations && $especializations->count())) d-none @endif">
        <select class="dinamicSelect form-control" name="id_especialization[]">
            <option value="" selected disabled>Selecione especialidade</option>
            @if(($especializations && $especializations->count()))                @foreach ($especializations as $option)
                    <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

</div>