        @foreach ($dados['sessions'][$key] as $fields)
            @if ($fields['name'] !== 'photo' && $fields['name'] !== 'doc_photo' && $fields['name'] !== 'cnh') 
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
                        @elseif($fields['type'] === 'selectComponent')
                            <livewire:select-component 
                                type="{{$fields['typeSelect']}}" 
                                placeholder="{{$fields['placeholder']}}" 
                                name="{{$fields['name']}}" 
                                selected="{{$fields['value']}}" 
                                required="{{$fields['required']}}"
                            />
                        @elseif($fields['type'] === 'selectClient')
                            <livewire:select-client 
                                placeholder="{{$fields['placeholder']}}" 
                                name="{{$fields['name']}}" 
                                selected="{{$fields['value']}}" 
                            />
                        @elseif($fields['type'] === 'number' && $fields['name'] !== 'ano' || $fields['name'] !== 'malas' || $fields['name'] !== 'passageiros')
                            <input 
                                class="form-control" 
                                type="{{ $fields['type'] }}" 
                                placeholder="{{ $fields['placeholder'] }}" 
                                id="{{ $fields['id'] }}"
                                name="{{ $fields['name'] }}" 
                                maxlength="{{ $fields['maxlenghtRoute'] ?? '' }}" 
                                value="{{ $fields['value'] ?? '' }}"
                                step="0.01"
                                {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
                                {{ $fields['required'] ? 'required' : '' }}
                            >
                        @else
                            <input 
                                class="form-control" 
                                type="{{ $fields['type'] }}" 
                                placeholder="{{ $fields['placeholder'] }}" 
                                id="{{ $fields['id'] }}"
                                name="{{ $fields['name'] }}" 
                                maxlength="{{ $fields['maxlenghtRoute'] ?? '' }}" 
                                value="{{ $fields['value'] ?? '' }}"
                                {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
                                {{ $fields['required'] ? 'required' : '' }}
                            >
                        @endif
                    </div>
                </div>
            @elseif ($fields['name'] === 'doc_photo' || $fields['name'] === 'cnh')
                <{{ $fields['container_tag'] }} class="{{ $fields['container_class'] }}">
                    <div class="form-group">
                        <label for="{{ $fields['id'] }}" class="form-control-label">
                            {{ $fields['label'] }}{{ $fields['required'] ? '*' : '' }}
                        </label>
                        @if ($fields['value'])
                            <br>
                            <a href="{{ asset($fields['value']) }}" data-fancybox>
                                <img src="{{ asset($fields['value']) }}" class="img-thumbnail" style="max-width: 200px;">
                            </a>
                        @endif
        
                        <input 
                            class="form-control filepond" 
                            type="{{ $fields['type'] }}" 
                            placeholder="{{ $fields['placeholder'] }}" 
                            id="{{ $fields['id'] }}"
                            name="{{ $fields['name'] }}" 
                            maxlength="{{ $fields['maxlenghtRoute'] ?? '' }}" 
                            value="{{ $fields['value'] ?? '' }}"
                            {{ $fields['function'] ? $fields['function']['type'] . '=' . $fields['function']['name'] : '' }}
                            {{ $fields['required'] ? 'required' : '' }}
                        >
                    </div>
                </div>
            @endif
        @endforeach
