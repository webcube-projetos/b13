<div>
    @foreach ($servicesOS as $service)
        <livewire:service-os-item 
            wire:key="{{ $service['id'] }}" 
            :serviceId="$service['id']" 
            :type="$service['type']" 
            :data="$service['data'] ?? null" 
        />
    @endforeach
</div>