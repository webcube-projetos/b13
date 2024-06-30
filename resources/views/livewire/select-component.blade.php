<div>
    <select wire:model.change="selected" class="dinamicSelect form-control" name="{{ $name }}" wire:ignore>
        <option value="" selected>{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>