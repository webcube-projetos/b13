<div>
    @foreach ($servicesOS as $service)
        @if ($service['type'] == 'locacao')
            <livewire:service-os-locacao :key="$service['id']" :serviceId="$service['id']" :data="$service['data'] ?? null" />
        @elseif ($service['type'] == 'seguranca')
            <livewire:service-o-s-seguranca :key="$service['id']" :serviceId="$service['id']" :data="$service['data'] ?? null" />
        @endif
    @endforeach
</div>
