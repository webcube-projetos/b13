<div class="form-group">
    <select 
        name="{{ $name }}" 
        id="{{ $componentId }}" 
        class="form-control"
        {{ $function ? $function['type'] . '=' . $function['name'] : '' }}
        {{ $required ? 'required' : '' }}
    >
        <option value="" selected disabled>Selecione {{ $label }}</option>
        @foreach ($registros as $registro)
            <option 
                value="{{ $registro['id'] }}" 
                @if ($value == $registro['id']) 
                     selected
                @endif
            >
                {{ $registro['nome'] }}
            </option>
        @endforeach
    </select>
</div>