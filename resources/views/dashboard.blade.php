@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb -->
        <!-- -------------------------------------------------------------- -->
        <div
            class="font-weight-medium shadow-none position-relative overflow-hidden mb-7"
        >
            <div class="card-body px-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-medium mb-0">Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a
                                        class="text-muted text-decoration-none"
                                        href=""
                                        >Home
                                    </a>
                                </li>
                                <li
                                    class="breadcrumb-item text-muted"
                                    aria-current="page"
                                >
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb End -->
        <!-- -------------------------------------------------------------- -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="d-flex align-items-center flex-wrap"
                                >
                                    <div>
                                        <h4 class="card-title">
                                            Welcome
                                        </h4>
                                        <p class="card-subtitle">
                                            Genba System
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (Auth::user()->role == "auditor")
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div>
                                        <h4 class="card-title">
                                            Checklist Saya
                                        </h4>
                                        <p class="card-subtitle mt-3">
                                            @foreach ($user_checklist as $row)
                                            <span class="badge bg-light-subtle px-3 py-2 rounded-2 text-dark">{{ $row->nama }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($user_checklist as $row)
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $row->nama }}</h4>
                  <p class="card-subtitle">Indikator Penggunaan</p>
                  <div id="our-visitors{{ $loop->iteration }}" class="mt-4"></div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center border-top mt-1">
                  <ul class="list-inline mb-0 hstack justify-content-center">
                    <li class="list-inline-item px-2 me-0">
                      <div class="text-primary d-flex align-items-center gap-2 fs-2">
                        <iconify-icon icon="ri:circle-fill" class="fs-2"></iconify-icon>Paham
                      </div>
                    </li>
                    <li class="list-inline-item px-2 me-0">
                      <div class="text-warning d-flex align-items-center gap-2 fs-2">
                        <iconify-icon icon="ri:circle-fill" class="fs-2"></iconify-icon>Tidak Paham
                      </div>
                    </li>
                    <li class="list-inline-item px-2 me-0">
                      <div class="text-danger d-flex align-items-center gap-2 fs-2">
                        <iconify-icon icon="ri:circle-fill" class="fs-2"></iconify-icon>Tidak Dipakai
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach


            <script>
                // -------------------------------------------------------------------------------------------------------------------------------------------
                // Dashboard 1 : Chart Init Js
                // -------------------------------------------------------------------------------------------------------------------------------------------
                document.addEventListener("DOMContentLoaded", function () {

                // -----------------------------------------------------------------------
                // Our visitor
                // -----------------------------------------------------------------------

                @for ($i=1; $i <= $user_checklist->count(); $i++)

                function randomSeries{{ $i }}(total = 100, count = 3) {
                    let numbers = [];
                    let remaining = total;

                    for (let i = 0; i < count - 1; i++) {
                        let value = Math.floor(Math.random() * (remaining + 1));
                        numbers.push(value);
                        remaining -= value;
                    }

                    numbers.push(remaining);

                    // optional: acak urutan
                    return numbers.sort(() => Math.random() - 0.5);
                }

                const series{{ $i }} = randomSeries{{ $i }}();

                var option_Our_Visitors{{ $i }} = {
                    series: series{{ $i }},
                    labels: ["Paham", "Tidak Paham", "Tidak Dipakai"],
                    chart: {
                    type: "donut",
                    height: 250,
                    fontFamily: "Inter",
                    },
                    dataLabels: {
                    enabled: false,
                    },
                    stroke: {
                    width: 0,
                    },
                    plotOptions: {
                    pie: {
                        expandOnClick: true,
                        donut: {
                        size: "83",
                        labels: {
                            show: true,
                            name: {
                            show: true,
                            offsetY: 7,
                            },
                            value: {
                            show: false,
                            },
                            total: {
                            show: true,
                            color: "#a1aab2",
                            fontSize: "13px",
                            label: "Indikator Penggunaan",
                            },
                        },
                        },
                    },
                    },
                    colors: ["var(--bs-primary)", "var(--bs-warning)", "var(--bs-danger)"],
                    tooltip: {
                    show: true,
                    fillSeriesColor: false,
                    },
                    legend: {
                    show: false,
                    },
                    responsive: [
                    {
                        breakpoint: 1025,
                        options: {
                        chart: {
                            height: 270,
                        },
                        },
                    },
                    {
                        breakpoint: 426,
                        options: {
                        chart: {
                            height: 250,
                        },
                        },
                    },
                    ],
                };

                var chart_pie_donut{{ $i }} = new ApexCharts(
                    document.querySelector("#our-visitors{{ $i }}"),
                    option_Our_Visitors{{ $i }}
                );
                chart_pie_donut{{ $i }}.render();

                @endfor

                });

            </script>

            @endif
        </div>
    </div>
</div>

@endsection