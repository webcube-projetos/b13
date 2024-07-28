@extends('layouts.user_type.auth')

@section('content')

@push('headPagina')
	@vite(['resources/js/app.js'])
@endpush

<livewire:o-s.cadastro :dados="$dados" :id="$id" />


@endsection
