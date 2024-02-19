@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ $dados['pageInfo']['title'] }}</h6>
            </div>
            
            <div class="card-body pt-4 p-3">
                <form action="{{ $dados['pageInfo']['form_action'] }}" method="{{ $dados['pageInfo']['form_method'] }}" role="form text-left">
                    @csrf
                    <div class="row">
                        @foreach ($dados['sessions'] as $key => $group)
                            <p class="fw-bold">{{ $key }}</p>

                            @include('register.formRegister');
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ $dados['pageInfo']['label_button'] }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
