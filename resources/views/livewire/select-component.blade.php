<div>
    @if ($name != 'vehicleModel[]')
    <select class="dinamicSelect form-control" name="{{ $name }}" id="{{ $name }}" wire:model.change="selected">
        <option value="" selected>{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
    @else
    <select class="dinamicSelect form-control" name="{{ $name }}" id="{{ $name }}" wire:model.change="selected">
        <option value="" selected>{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->brand_name }} {{ $option->model }} {{ $option->plate }} </option>
        @endforeach
    </select>
    @endif
</div>