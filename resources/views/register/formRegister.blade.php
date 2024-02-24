@foreach ($dados['sessions'][$key] as $fields)
    @if ($fields['name'] !== 'foto') 
        <{{ $fields['container_tag'] }} class="{{ $fields['container_class'] }}">
            <div class="form-group">
                <label 
                    for="{{ $fields['id'] }}" 
                    class="form-control-label"
                >
                    {{ $fields['label'] }}{{ $fields['required'] ? '*' : '' }}
                </label>
                @if ( $fields['type'] === 'select' )
                    @if ( $fields['name'] === 'blindado' )
                        <div class="form-group">
                            <select 
                                name="{{ $fields['name'] }}" 
                                id="{{ $fields['id'] }}" 
                                class="form-control"
                                {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
                                {{ $fields['required'] ? 'required' : '' }}
                            >
                                <option value="" selected disabled>Selecione {{ $fields['label'] }}</option>
                                    <option 
                                        value="0" 
                                        @if ($fields['value'] === 0) 
                                            selected
                                        @endif
                                    >
                                        Não
                                    </option>
                                    <option 
                                        value="1" 
                                        @if ($fields['value'] === 1) 
                                            selected
                                        @endif
                                    >
                                        Sim
                                    </option>
                            </select>
                        </div>
                    @else
                        <x-select-component 
                            name="{{ $fields['name'] }}"
                            componentId="{{ $fields['id'] }}"
                            label="{{ $fields['label'] }}"
                            route="{{ $fields['route'] }}"
                            required="{{ $fields['required'] }}"
                            function="{{ $fields['function'] }}"
                            value="{{ $fields['value'] }}"
                        />
                    @endif
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
    @endif
    
@endforeach