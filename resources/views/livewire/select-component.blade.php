<div>
    <select class="dinamicSelect form-control" name="{{ $name }}" id="{{ $name }}" wire:model.change="selected">
        <option value="" selected>{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>