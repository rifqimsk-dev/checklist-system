@extends('layout.main')
@section('content')

<style>
    table, tbody, thead, tr, th, td {
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
                                            <td class="align-middle">{{ $row->pertanyaan }}</td>
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
                        </div>
                    </div>
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection