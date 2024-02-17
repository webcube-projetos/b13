@php
  $info = [
    'os_encerradas' => 38,
    'os_abertas' => 14,
    'orcamentos' => 6,
    'a_receber' => 1500,
    'a_pagar' => 900,
    'total' => 26000,
    'carros' => 180,
    'motoristas' => 100,
    'clientes' => 96,
    'empresas' => 43
  ];
  $chart_Services = [
    'months' => [
      'Janeiro',
      'Fevereiro',
      'Março', 
      'Abril',
    ],
    'values' => [
      16,
      24,
      56,
      41
    ],
  ]
@endphp

@extends('layouts.user_type.auth')

@section('content')

  <div class="row mb-4">
    <!-- CADASTRAR ORÇAMENTO -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card bg-gradient-primary">
        <div class="card-body p-2 px-3">
          <div class="row">
            <div class="col-12">
              <a href="#">
                <p class="text-white text-uppercase">cadastrar novo orçamento</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM CADASTRO ORÇAMENTO -->
    <!-- OS ENCERRADAS -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">O.S Encerradas</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $info['os_encerradas'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM OS ENCERRADAS -->
    <!-- OS EM ABERTO -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">O.S Em Aberto</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $info['os_abertas'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-tasks" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM OS EM ABERTO -->
    <!-- ORÇAMENTOS -->
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Orçamentos</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $info['orcamentos'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-spinner" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM ORÇAMENTOS -->
  </div>
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
                  {{ $info['a_receber'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
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
                  {{ $info['a_pagar'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
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
                  {{ $info['total'] }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM TOTAL -->
  </div>
  <div class="row mt-4">
    <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card z-index-2">
        <div class="card-body p-3">
          <!-- CHART O.S. FINALIZADAS -->
          <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
          <!-- FIM CHART O.S. FINALIZADAS -->
          <h6 class="ms-2 mt-4 mb-0"> Ativos cadastrados </h6>
          <div class="container border-radius-lg">
            <div class="row">
              <!-- CARROS -->
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center p-2">
                    <i class="fa fa-car" aria-hidden="true"></i>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Carros</p>
                </div>
                <h4 class="font-weight-bolder">{{ $info['carros'] }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <!-- FIM CARROS -->
              <!-- MOTORISTAS -->
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center p-2">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Motoristas</p>
                </div>
                <h4 class="font-weight-bolder">{{ $info['motoristas'] }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <!-- FIM MOTORISTAS -->
              <!-- CLIENTES -->
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center p-2">
                    <i class="fa fa-address-book-o" aria-hidden="true"></i>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Clientes</p>
                </div>
                <h4 class="font-weight-bolder">{{ $info['clientes'] }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <!-- FIM CLIENTES -->
              <!-- EMPRESAS -->
              <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                  <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center p-2">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                  </div>
                  <p class="text-xs mt-1 mb-0 font-weight-bold">Empresas</p>
                </div>
                <h4 class="font-weight-bolder">{{ $info['empresas'] }}</h4>
                <div class="progress w-75">
                  <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <!-- FIM EMPRESAS -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <!-- CHART POR SERVIÇO -->
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Serviços finalizados</h6>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
      <!-- FIM CHART POR SERVIÇO -->
    </div>
  </div>

@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Janeiro", "Fevereiro", "Março", "Abril"],
          datasets: [{
            label: "O.S Finalizadas",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Janeiro", "Fevereiro", "Março", "Abril"],
          datasets: [{
              label: "Locação",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220],
              maxBarThickness: 6

            },
            {
              label: "Segurança",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush
