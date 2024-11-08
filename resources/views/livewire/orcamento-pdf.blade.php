<div>
    @php
        $total = 0;
    @endphp
    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('fonts/OpenSans.ttf') }}') format('truetype');
        }

        /*GERAL*/
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        img {
            width: 100%;
        }

        .orange {
            color: #FF9921;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        h2 {
            font-size: 32px;
            color: #252525;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            color: #252525;
            margin-bottom: 0px;
        }

        span {
            font-weight: bold;
            color: #747474;
            margin-bottom: 0px;
        }

        /*SPACING*/
        .mb-0 {
            margin-bottom: -10px;
        }

        .pb-0 {
            padding-bottom: 0;
        }

        .my-2 {
            margin: 32px 0;
        }

        .mb-3 {
            margin-bottom: 32px;
        }

        /*PAGE*/
        header {
            margin-top: -5px;
            background-color: #F9F9F9;
            padding: 8px 32px;
            vertical-align: middle;
        }

        header div,
        footer div {
            display: inline-block;
            width: 49%;
        }

        .rodape div#left {
            display: inline-block;
            width: 65%;
        }

        .rodape div#right {
            display: inline-block;
            width: 34%;
            text-align: right;
            margin-left: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        thead {
            background-color: #252525;
        }

        thead th {
            padding: 4px 16px;
            text-transform: uppercase;
        }

        thead th,
        thead th span {
            color: #fff;
            font-size: 18px;
        }

        thead th span {
            font-size: 12px;
        }

        tbody tr:nth-child(2n) {
            background-color: #e0e0e0;
        }

        tr td {
            font-size: 18px;
            padding: 4px 16px;
            text-align: center;
        }

        .nobreak {
            white-space: nowrap;
        }

        .total {
            display: inline-block;
            background-color: #252525;
            color: #fff;
            padding: 8px 16px;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: bold;
        }

        footer {
            background-color: #252525;
            padding: 0px 16p 4px 16px;
            margin-top: 32px;
        }

        footer p {
            margin-bottom: 0px;
            color: #fff;
            font-weight: bold;
        }
    </style>
    <img src="{{ public_path('assets/img/orcamento-header.png') }}" alt="Cabeçalho Orçamento">
    <header>
        <div>
            <p><span>Cliente:</span> {{ $os->client->name }} <br> <span>Contato:</span> {{ $os->contact->name }}</p>
        </div>
        <div class="text-right">
            <p><span>Data:</span> <span class="orange">{{ $formattedCreatedAt }}</span></p>
        </div>
    </header>
    <div class="corpo">
        <h2 class="text-center">ORÇAMENTO <span class="orange">{{ $os->id }}</span></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Início</th>
                    <th>Término</th>
                    <th class="text-center">Qtd <br><span>Diárias</span></th>
                    <th class="text-center">Qtd <br><span>Veículos</span></th>
                    <th>Veículo</th>
                    <th class="text-center">Blindado</th>
                    <th>Qtd <br><span>Passageiros</span></th>
                    <th>Qtd <br><span>Malas</span></th>
                    <th>Serviço</th>
                    <th class="text-center">Franquia</th>
                    <th class="text-center">Motorista <br><span>Bilíngue</span></th>
                    <th>Valor <br><span>Diária</span></th>
                    <th>Valor <br><span>Hora Extra</span></th>
                    <th>Valor <br><span>Km Extra</span></th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($os->services as $service)
                    <tr>
                        <td class="nobreak">{{ $service->start }}</td>
                        <td class="nobreak">{{ $service->finish }}</td>
                        <td>{{ $service->qtd_days }}</td>
                        <td>{{ $service->qtd_service }}</td>
                        <td class="nobreak">
                            {{ $service->modelo_veiculo ? $service->modelo_veiculo : $service['service']->vehicleType->name }}
                        </td>
                        <td>{{ $service['service']->blindado_armado ? 'Sim' : 'Não' }}</td>
                        <td>{{ $service->passengers }}</td>
                        <td>{{ $service->bags }}</td>
                        <td class="nobreak">
                            {{ $service['service']->categoryService->name . ' ' . $service['service']->time . ' horas' }}
                        </td>{{-- Diária --}}
                        <td>{{ $service['service']->km . 'km' }}</td>
                        <td>{{ $service['service']->bilingual ? 'Sim' : 'Não' }}</td>
                        <td>R${{ number_format($service['service']->price / 100, 2, ',', '.') }}</td>
                        <td>R${{ number_format($service['service']->extra_price / 100, 2, ',', '.') }}</td>
                        <td>R${{ number_format($service['service']->km_extra / 100, 2, ',', '.') }}</td>
                        <td>R${{ number_format(($service->price * $service->qtd_days * $service->qtd_service / 100), 2, ',', '.') }}
                        </td>
                    </tr>
                    {{ $total += ($service->price * $service->qtd_days * $service->qtd_service / 100) }}
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="obs">
        <p class="mb-3"><span style="font-weight:bold">OBS:</span> Estacionamento e pedágios serão cobrados a parte
            caso tenha necessidade. O valor inclui a taxa de R$50,00 do receptivo no aeroporto</p>
    </div>
    <div class="rodape my-2">
        <div id="left">
            <p style="font-weight:bold;" class="mb-0 pb-0">Condições de Pagamento: {{ $os->paymentOption->description }} </p>
            <p style="font-weight:bold">Condição de pagamento: {{ $os->paymentMethod->description }} </p>
        </div>
        <div id="right">
            <div class="total">
                TOTAL: R${{ number_format(($total), 2, ',', '.') }}
            </div>
        </div>
    </div>
    <footer>
        <div>
            <p>Validade do orçamento: 30 dias</p>
        </div>
        <div style="text-align: right;">
            <p>B13 Company - 25.241.888/0001-85</p>
        </div>
    </footer>
</div>
