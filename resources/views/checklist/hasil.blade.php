@extends('layout.main')
@section('content')

<style>
    table, tbody, thead, tfoot, tr, th, td {
        border: 1px solid #cfcfcf !important;
    }
</style>
    
<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="datatables">
                    <!-- start Zero Configuration -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hasil Checklist</h4>
                            <form action="{{ route('hasilchecklist.view') }}" method="get">
                                <div class="row">
                                    <div class="form-group mb-2 col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text" id="user_checklist_id"><i class="ti ti-user"></i></span>
                                            <select name="user_checklist_id" class="form-control">
                                                <option value="" disabled selected>Pilih Checklist</option>
                                                @foreach ($user_checklist as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="bulan"><i class="ti ti-calendar"></i></span>
                                            <select name="bulan" class="form-control">
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text" id="dealer_id"><i class="ti ti-building"></i></span>
                                            <select name="dealer_id" class="form-control">
                                                <option value="" disabled selected>Pilih Dealer</option>
                                                @foreach ($dealer as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 col-md-1">
                                        <button class="btn btn-danger rounded-2"><i class="ti ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($hasil->isNotEmpty())
                            <b>
                                <span class="ti ti-calendar"></span> {{ \Carbon\Carbon::create()->month($hasil->first()->bulan)->locale('id')->translatedFormat('F') }} <br>
                                <span class="ti ti-building"></span>  
                                @php $row = $hasil->first() @endphp

                                {{ $row?->dealer?->nama ?? '-' }}

                                <br>
                                <span class="ti ti-user"></span> {{ $user_checklist_one->nama }} <br>
                            </b>
                            <div class="table-responsive mt-3">
                                <div class="row mb-1">
                                    <div class="col-md-6">
                                        <label>Nama: {{ $hasil->first()->nama }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="d-flex justify-content-end">Honda ID: {{ $hasil->first()->hondaID }}</label>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead bgcolor="#f5f5f5">
                                        <tr>
                                            <th rowspan="2" class="align-middle text-center" width="1">No</th>
                                            <th rowspan="2" class="align-middle text-center">Pertanyaan</th>
                                            <th colspan="3" class="align-middle text-center">Indikator</th>
                                            <th rowspan="2" class="align-middle text-center">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th class="align-middle text-center">1</th>
                                            <th class="align-middle text-center">2</th>
                                            <th class="align-middle text-center">3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasil as $row)
                                        <tr>
                                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{!! $row->pertanyaan !!}</td>
                                            <td class="align-middle text-center">
                                                @if ($row->indikator === 1)
                                                    <i class="ti ti-check bg-success text-white p-1 rounded-1"></i>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($row->indikator === 2)
                                                    <i class="ti ti-check bg-success text-white p-1 rounded-1"></i>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($row->indikator === 3)
                                                    <i class="ti ti-check bg-success text-white p-1 rounded-1"></i>
                                                @endif
                                            </td>
                                            <td class="align-middle">{{ $row->keterangan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2"></th>
                                            <th class="text-center">{{ $count_1 = $hasil->where('indikator', 1)->count() }}</th>
                                            <th class="text-center">{{ $hasil->where('indikator', 2)->count() }}</th>
                                            <th class="text-center">{{ $hasil->where('indikator', 3)->count() }}</th>
                                            <th class="text-center">{{ round($count_1 * 100 / $hasil->count())  }}%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="mt-3">
                                    <h5>Keterangan</h5>
                                    <div>
                                        <b>1</b> <span class="ms-2">Paham</span>
                                    </div>
                                    <div>
                                        <b>2</b> <span class="ms-2">Tidak Paham</span>
                                    </div>
                                    <div>
                                        <b>3</b> <span class="ms-2">Tidak DIpakai</span>
                                    </div>
                                </div>
                            </div>
                            @else 
                            <div class="text-center">
                                <img src="{{ asset('assets/icons/empty_search.svg') }}" width="200" alt="Empty Search">
                                <h4>Data tidak ditemukan</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection