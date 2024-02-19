@foreach ($dados['sessions'][$key] as $fields)
    <{{ $fields['container_tag'] }} class="{{ $fields['container_class'] }}">
        <div class="form-group">
            <label 
                for="{{ $fields['id'] }}" 
                class="form-control-label"
            >
                {{ $fields['label'] }}{{ $fields['required'] ? '*' : '' }}
            </label>
            <input 
                class="form-control" 
                type="{{ $fields['type'] }}" 
                placeholder="{{ $fields['placeholder'] }}" 
                id="{{ $fields['id'] }}"
                name="{{ $fields['name'] }}" 
                maxlength="{{ $fields['maxlength'] }}" 
                {{ $fields['required'] ? 'required' : '' }}
                {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
            >
        </div>
    </div>
@endforeach