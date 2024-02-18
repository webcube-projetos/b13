<div>
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input 
			type="text" 
			placeholder="{{ $placeholder ?? 'Pesquisar'}}" 
			id="{{ $id ?? 'inputComponent' }}"
			name="{{ $name ?? 'inputName' }}"
			onfocus="focused(this)"
			onfocusout="defocused(this)"
    >
</div>
