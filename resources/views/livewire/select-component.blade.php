<div>
    <select class="dinamicSelect form-control" name="{{ $name }}" {{ $required ? 'required' : '' }}>
        <option value="" selected disabled>Selecione {{ $placeholder }}</option>
        @foreach ($options as $option)
            <option {{ $selected == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>