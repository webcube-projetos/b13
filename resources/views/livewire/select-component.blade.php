<div>
    <select  class="dinamicSelect form-control" name="{{ $name }}" id="{{ $name }}" wire:model.live="selected">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">
                @if ($name != 'vehicleModel[]')
                    {{ $option->name }}
                @else
                    {{ $option->brand_name }} {{ $option->model }} {{ $option->plate }}
                @endif
            </option>
        @endforeach
    </select>
</div>