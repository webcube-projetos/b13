<select name="{{ $name }}" id="{{ $id }}" class="dinamicSelect form-control">
    @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
    @endforeach
</select>