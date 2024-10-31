<div wire:ignore>
    <select @if ($readonly) disabled @endif
        class="@if ($search) search @else dinamicSelect form-control @endif"
        name="{{ $name }}" id="{{ $name }}" wire:model.live="selected">
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

@script
    <script>
        $(document).ready(function() {

        });
        Livewire.hook('element.init', ({
            component,
            el
        }) => {
            if (component.canonical.type == 'employee_driver') {
                const selects = component.el.querySelectorAll('.search');
                selects.forEach(select => {
                    if (!select || !select.tagName || select.tagName.toLowerCase() !== 'select') {
                        return;
                    }

                    if (select.classList.contains('tomselected') || select.tomselect) {
                        return;
                    }

                    if (select.options.length === 0) {
                        const emptyOption = new Option('', '');
                        select.appendChild(emptyOption);
                    }

                    try {
                        new TomSelect(select, {
                            allowEmptyOption: true,
                            create: false,
                            sortField: {
                                field: "text",
                                direction: "asc"
                            },
                            onInitialize: function() {
                                // Limpa a seleção inicial
                            },
                            onType: function(str) {
                                if (str !== null && str !== undefined) {
                                    @this.set('searchTerm', str);
                                }
                            }
                        });
                    } catch (error) {
                        console.error('Erro ao inicializar TomSelect:', error);
                    }
                });
            }
        });
    </script>
@endscript
