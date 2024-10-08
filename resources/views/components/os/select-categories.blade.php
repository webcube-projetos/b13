<select name="{{ $name }}" id="{{ $id }}" class="dinamicSelect form-control">
    @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>
            {{ $option->name }}
        </option>
    @endforeach
</select>
