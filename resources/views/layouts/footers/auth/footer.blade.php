<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, desenvolvido por
                    <a href="#" class="font-weight-bold" target="_blank">Webcube</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="loading">
    <img src="{{ asset('assets/img/loading.gif') }}" alt="Loading..." />
</div>

<x-modal-alert />
@include('modals.modalErrorHandle')

@livewireScripts
@stack('scripts')
