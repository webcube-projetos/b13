<div wire:ignore>
    <select  class="@if($search)search @else dinamicSelect form-control  @endif" name="{{ $name }}" id="{{ $name }}" wire:model.live="selected">
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
            const selects = document.querySelectorAll(".search")
            
            selects.forEach(select => {
                new TomSelect(select,{
                    allowEmptyOption: true,
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    onInitialize: function() {
                        this.clear(true); // Limpa a seleção inicial
                    },
                    onType: function(str) {
                        @this.set('searchTerm', str);
                    }
                }) 
            })
        });
    </script>
@endscript