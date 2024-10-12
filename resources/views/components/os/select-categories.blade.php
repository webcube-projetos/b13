<select name="{{ $name }}" id="{{ $id }}" class="dinamicSelect form-control" wire:model.live="{{ $wireModel}}">
    @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>
            {{ $option->name }}
        </option>
    @endforeach
</select>
