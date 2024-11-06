<div class="container" x-data="{ isOpen: false, tab: 'gastos' }">
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
                                                        <button type="button" x-on:click="isOpen = true"
                                                            class="tw-p-[12px]"
                                                            wire:click="verDetalhes({{ $expense->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                                                            </svg>
                                                        </button>
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
    <aside x-show="isOpen"
        class="tw-fixed tw-top-0 tw-right-0 tw-z-40 tw-w-[300px] tw-h-[95%] tw-transition-transform tw-duration-300 tw-ease-in-out tw-bg-white tw-shadow-lg tw-rounded-l-lg tw-top-1/2 tw-transform tw-translate-y-[-50%] tw-p-[16px]">
        <button x-on:click="isOpen = false; tab = 'gastos'" type="button" class="tw-absolute tw-top-3 tw-right-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#afafaf"
                class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path
                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
            </svg>
        </button>

        <h4 class="tw-font-bold">Detalhes</h4>

        <div
            class="box tw-bg-[#afafaf1c] tw-w-full tw-rounded-[5px] tw-h-[50px] tw-mt-[16px] tw-flex tw-items-center tw-p-[16px]">
            <div class="tw-rounded-full tw-w-[25px] tw-h-[25px] tw-flex tw-items-center tw-justify-center tw-bg-white">
                <i class="bi bi-car-front-fill"></i>
            </div>
            @if ($itens)
                @php $company = $itens->first()->execution->motorista->company @endphp
                @php $employee = $itens->first()->execution->motorista->employee @endphp
                <p class="tw-ml-[16px]">
                    {{ !$company || in_array($company->name, ['B13 COMPANY LTDA', 'Freelance']) ? $employee->name : $company->name }}
                </p>
            @endif
        </div>

        <div class="nav-wrapper position-relative end- tw-mt-[16px]">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" id="cadastro-tab" data-bs-toggle="tab" type="button"
                        role="tab" aria-controls="cadastro" aria-selected="true"
                        x-on:click="tab = 'gastos'">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" id="conta-tab" data-bs-toggle="tab" data-bs-target="#conta"
                        type="button" role="tab" aria-controls="conta" aria-selected="true"
                        x-on:click="tab = 'contas'">Conta Bancária</a>
                </li>
            </ul>
        </div>

        <div class="tw-mt-[16px]" x-show ="tab == 'gastos'">
            <div
                class="tw-max-w-md tw-mx-auto tw-bg-white tw-border tw-border-[#1c2a4333] tw-rounded-lg tw-overflow-hidden">
                <div class="tw-space-y-4 tw-p-6">

                    @forelse ($itens as $item)
                        @php $execution = $item->execution @endphp
                        <div class="tw-border-b tw-pb-4 tw-mb-[16px]">
                            <div class="tw-flex tw-justify-between tw-items-start tw-mb-2">
                                <div>
                                    <h2 class="tw-text-sm tw-font-bold">
                                        {{ $execution->osService->service->name }}</h2>
                                </div>
                                <div class="tw-text-right">
                                    <p class="tw-text-sm tw-font-bold">{{ $execution->date->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>

                            @if (!$company || in_array($execution->motorista->company->name, ['B13 COMPANY LTDA', 'Freelance']))
                                <div class="tw-space-y-2">
                                    <div class="tw-flex tw-justify-between">
                                        <span class="tw-text-gray-600 tw-text-sm">Parceiro</span>
                                        <span class="tw-text-gray-600 tw-text-sm">
                                            R${{ number_format($execution->motorista->oSService->employee_cost / 100, 2, ',', '.') }}
                                        </span>
                                    </div>
                                    @if ($execution->exceed_time)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Hora extra</span>
                                            <span class="tw-text-gray-600 tw-text-sm">
                                                R${{ number_format((($execution->exceed_time / 60) * $execution->motorista->oSService->employee_extra) / 100, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    @endif
                                    @if ($execution->toll)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Pedagio</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->toll / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    @if ($execution->parking)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Estacionamento</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->parking / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    @if ($execution->another_expenses)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Outros</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->another_expenses / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="tw-space-y-2">
                                    <div class="tw-flex tw-justify-between">
                                        <span class="tw-text-gray-600 tw-text-sm">Parceiro</span>
                                        <span class="tw-text-gray-600 tw-text-sm">
                                            R${{ number_format($execution->motorista->oSService->partner_cost / 100, 2, ',', '.') }}
                                        </span>
                                    </div>
                                    @if ($execution->km_exceed)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">KM extra</span>
                                            <span class="tw-text-gray-600 tw-text-sm">
                                                R${{ number_format(($execution->km_exceed * $execution->motorista->oSService->partner_extra_km) / 100, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    @endif
                                    @if ($execution->exceed_time)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Hora extra</span>
                                            <span class="tw-text-gray-600 tw-text-sm">
                                                R${{ number_format((($execution->exceed_time / 60) * $execution->motorista->oSService->partner_extra_time) / 100, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    @endif
                                    @if ($execution->toll)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Pedagio</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->toll / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    @if ($execution->parking)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Estacionamento</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->parking / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    @if ($execution->another_expenses)
                                        <div class="tw-flex tw-justify-between">
                                            <span class="tw-text-gray-600 tw-text-sm">Outros</span>
                                            <span
                                                class="tw-text-gray-600 tw-text-sm">R${{ number_format($execution->another_expenses / 100, 2, ',', '.') }}</span>
                                        </div>
                                    @endif

                                </div>
                            @endif
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>

        <div class="tw-mt-[16px]" x-show ="tab == 'contas'">
            <div
                class="tw-max-w-md tw-mx-auto tw-bg-white tw-border tw-border-[#1c2a4333] tw-rounded-lg tw-overflow-hidden">
                <div class="tw-space-y-4 tw-p-6">
                    @if (isset($company) || isset($employee))
                        @if (isset($company) && in_array($company?->name, ['B13 COMPANY LTDA', 'Freelance']))
                            @if (isset($employee) && $employee->bank?->bank)
                                <div>
                                    <h2 class="tw-text-sm tw-font-bold">
                                        Conta Bancária</h2>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Banco</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->bank }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Nª Banco</span>
                                    <span
                                        class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->bank_number }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Agencia</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->agency }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Conta</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->cc }}</span>
                                </div>
                            @endif
                            @if (isset($employee) && $employee->bank && $employee->bank->key)
                                <div>
                                    <h2 class="tw-text-sm tw-font-bold">
                                        PIX</h2>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Tipo</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->key_type }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Chave</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $employee->bank->key }}</span>
                                </div>
                            @endif
                        @else
                            @if (isset($company) && $company->bank && $company->bank->bank)
                                <div>
                                    <h2 class="tw-text-sm tw-font-bold">
                                        Conta Bancária</h2>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Banco</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->bank }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Nª Banco</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->bank_number }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Agencia</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->agency }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Conta</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->cc }}</span>
                                </div>
                            @endif
                            @if (isset($company) && $company->bank && $company->bank->key)
                                <div>
                                    <h2 class="tw-text-sm tw-font-bold">
                                        PIX</h2>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Tipo</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->key_type }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between !tw-mt-[3px]">
                                    <span class="tw-text-gray-600 tw-text-sm">Chave</span>
                                    <span class="tw-text-gray-600 tw-text-sm">{{ $company->bank->key }}</span>
                                </div>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </aside>
</div>




@script
    <script>
        $wire.on('payed', () => {
            const select = document.querySelector('#paymentMethod')

            select.disabled = true

        })
    </script>
@endscript
