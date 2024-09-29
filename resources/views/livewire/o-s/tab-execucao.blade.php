<div class="row linha-add position-relative">
    <div class="col-12">
        <div class="row align-items-center">
            <div class="col-12 text-end">
                <a href="#" class="btn bg-gradient-dark btn-md mt-4 mb-4">Adicionar rota</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Veículo</th>
                        <th scope="col">Motorista</th>
                        <th scope="col">Início</th>
                        <th scope="col">Término</th>
                        <th scope="col">Execdias</th>
                        <th scope="col">KM Inicial</th>
                        <th scope="col">KM Final</th>
                        <th scope="col">KM Percorridos</th>
                        <th scope="col">KM Excedidos</th>
                        <th scope="col">Pedágio</th>
                        <th scope="col">Estacionamento</th>
                        <th scope="col">Outras Despesas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($execucoes as $execucao)
                        <livewire:o-s.linhas-execucao :execucao="$execucao" wire:key="{{$execucao->id}}">
                    @endforeach
  
                </tbody>
            </table>
        </div>
    </div>
</div>  
  
