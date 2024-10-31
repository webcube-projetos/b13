<div class="container">
    <div class="row">
        <div class="col-lg-12 tw-mb-[32px]">
            <div class="row">
                <!-- A RECEBER -->
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">A receber</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ 'R$ ' . number_format($entries->where('status', 0)->sum('total') / 100, 2, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM A RECEBER -->
                <!-- A PAGAR -->
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">A pagar</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ 'R$ ' . number_format($expenses->where('status', 0)->sum('total') / 100, 2, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa fa-window-close-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM A PAGAR -->
                <!-- TOTAL -->
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ 'R$ ' . number_format(($entries->where('status', 1)->sum('total') - $expenses->where('status', 1)->sum('total')) / 100, 2, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM TOTAL -->
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="row align-items-center">
                        <div class="col-12 tw-mb-[16px]">
                            <h2>Entradas</h2>
                        </div>

                        <div class="col-lg-6 mt-4">
                            <label for="paymentMethod">Condição de pagamento</label>
                            <livewire:select-component type="paymentMethod"
                                placeholder="Selecione a condição de pagamento" name="paymentMethod" id="paymentMethod"
                                selected='{{ $paymentMethod }}' targetClass="{{ $targetClass }}"
                                readonly="{{ $payed }}" />
                        </div>
                        <div class="col-lg-6 mt-4">
                            <label for="paymentOptions">Forma de pagamento</label>
                            <livewire:select-component type="paymentOptions"
                                placeholder="Selecione a forma de pagamento" name="paymentOptions" id="paymentOptions"
                                selected='{{ $paymentOptions }}' targetClass="{{ $targetClass }}" />
                        </div>
                        <div class="col-12 tw-mt-[16px]">
                            <div id="box-linhas-entrada">
                                <div
                                    class="tw-overflow-hidden tw-w-full tw-overflow-x-auto tw-rounded-md tw-border tw-border-neutral-300">
                                    <table class="tw-w-full tw-text-left tw-text-sm tw-text-neutral-600">
                                        <thead
                                            class="tw-border-b tw-border-neutral-300 tw-bg-neutral-50 tw-text-sm tw-text-neutral-900 tw-bg-[#ffebd3]">
                                            <tr>
                                                <th scope="col" class="tw-p-4">Cliente</th>
                                                <th scope="col" class="tw-p-4">Total</th>
                                                <th scope="col" class="tw-p-4 tw-text-center">Parcela</th>
                                                <th scope="col" class="tw-p-4">Status</th>
                                                <th scope="col" class="tw-p-4">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tw-divide-y tw-divide-neutral-300">
                                            @foreach ($entries as $entry)
                                                <tr>
                                                    <td class="tw-p-4">{{ $entry->client->name }}</td>
                                                    <td class="tw-p-4">
                                                        <div class="tw-flex tw-items-center">
                                                            R${{ number_format($entry->total / 100, 2, ',', '.') }}
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="#157347" class="bi bi-arrow-up"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
                                                            </svg>
                                                        </div>
                                                    </td>
                                                    <td class="tw-p-4 tw-text-center">{{ $entry->installment }}</td>
                                                    <td class="tw-p-4">{{ $entry->status ? 'Pago' : 'Pendente' }}</td>
                                                    <td class="tw-p-4">
                                                        <input type="date" value="{{ $entry->date }}"
                                                            wire:change="updateDate($event.target.value, {{ $entry->id }})">
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="row align-items-center">
                        <div class="col-12 tw-mb-[16px]">
                            <h2>Saídas</h2>
                        </div>

                        <div class="col-12">
                            <div id="box-linhas-saida">
                                <div
                                    class="tw-overflow-hidden tw-w-full tw-overflow-x-auto tw-rounded-md tw-border tw-border-neutral-300">
                                    <table class="tw-w-full tw-text-left tw-text-sm tw-text-neutral-600">
                                        <thead
                                            class="tw-border-b tw-border-neutral-300 tw-bg-neutral-50 tw-text-sm tw-text-neutral-900 tw-bg-[#ffebd3]">
                                            <tr>
                                                <th scope="col" class="tw-p-4">Recebedor</th>
                                                <th scope="col" class="tw-p-4">Total</th>
                                                <th scope="col" class="tw-p-4">Status</th>
                                                <th scope="col" class="tw-p-4">Data</th>
                                                <th scope="col" class="tw-p-4 tw-text-center">Detalhes</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tw-divide-y tw-divide-neutral-300">
                                            @foreach ($expenses as $expense)
                                                <tr>
                                                    <td class="tw-p-4">
                                                        {{ $expense->company->name ?? $expense->employee->name }}</td>
                                                    <td class="tw-p-4">
                                                        <div class="tw-flex tw-items-center">
                                                            R${{ number_format($expense->total / 100, 2, ',', '.') }}
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="#DC3545"
                                                                class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                                            </svg>
                                                        </div>
                                                    </td>
                                                    <td class="tw-p-4">{{ $expense->status ? 'Pago' : 'Pendente' }}
                                                    </td>
                                                    <td class="tw-p-4">
                                                        <input type="date" value="{{ $expense->date }}"
                                                            wire:change="updateDate($event.target.value, {{ $expense->id }})">
                                                    </td>

                                                    <td class="tw-p-4 tw-text-center tw-flex tw-justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@script
    <script>
        $wire.on('payed', () => {
            const select = document.querySelector('#paymentMethod')

            select.disabled = true

        })
    </script>
@endscript
