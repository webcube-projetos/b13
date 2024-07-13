<div>
    @foreach ($servicesOS as $service)
        <livewire:service-os-locacao :key="$service['id']" :serviceId="$service['id']" :type="$service['type']" :data="$service['data'] ?? null" />
    @endforeach
</div>
