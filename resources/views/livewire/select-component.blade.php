<div>
    <select class="dinamicSelect" name="{{ $name }}">
        <option value="" selected disabled>Selecione {{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>

@push('scripts')
    @vite(['resources/js/selectComponent.js'])
@endpush