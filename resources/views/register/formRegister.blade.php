@foreach ($dados['sessions'][$key] as $fields)
    <{{ $fields['container_tag'] }} class="{{ $fields['container_class'] }}">
        <div class="form-group">
            <label 
                for="{{ $fields['id'] }}" 
                class="form-control-label"
            >
                {{ $fields['label'] }}{{ $fields['required'] ? '*' : '' }}
            </label>
            @if ( $fields['type'] === 'select' )
                <livewire:select-component 
                    name="{{ $fields['name'] }}"
                    componentId="{{ $fields['id'] }}"
                    label="{{ $fields['label'] }}"
                    route="{{ $fields['maxlenghtRoute'] }}"
                    required="{{ $fields['required'] }}"
                    function="{{ $fields['function'] }}"
                    value="{{ $fields['value'] }}"
                />
            @else
                <input 
                    class="form-control" 
                    type="{{ $fields['type'] }}" 
                    placeholder="{{ $fields['placeholder'] }}" 
                    id="{{ $fields['id'] }}"
                    name="{{ $fields['name'] }}" 
                    maxlength="{{ $fields['maxlenghtRoute'] }}" 
                    value="{{ $fields['value'] ?? '' }}"
                    {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
                    {{ $fields['required'] ? 'required' : '' }}
                >
            @endif
        </div>
    </div>
@endforeach