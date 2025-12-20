@extends('layout.main')
@section('content')
    
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
                            <h4 class="card-title">Summary</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($isi_checklist->isNotEmpty())

                                @if ($summary->isNotEmpty())
                                @include('summary.search')
                                <span class="fw-semibold d-block mt-4"><i class="ti ti-user"></i> {{ $user_checklist->nama }}</span>
                                <span class="fw-semibold d-block"><i class="ti ti-calendar"></i> {{ \Carbon\Carbon::create()->month($isi_checklist->first()->bulan)->locale('id')->translatedFormat('F') }}</span>
                                <span class="fw-semibold d-block">
                                    <i class="ti ti-building"></i> 
                                    @php $row = $isi_checklist->first() @endphp
                                    {{ $row?->dealer?->nama ?? '-' }}
                                </span>
                                {{-- LIST DATA --}}
                                <table class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>Proses</th>
                                            <th>PI</th>
                                            <th>CA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($summary as $summ)
                                        <tr>
                                            <td>{{ $summ->proses }}</td>
                                            <td>{{ $summ->pi }}</td>
                                            <td>{{ $summ->ca }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <a href="{{ route('summary.edit', ['user_checklist_id' => encrypt($summary->first()->user_checklist_id), 'dealer_id' => encrypt($summary->first()->dealer_id), 'bulan' => encrypt($summary->first()->bulan)]) }}" class="btn btn-danger rounded-2"><i class="ti ti-edit"></i> Ubah Data</a>

                                @else

                                <span class="fw-semibold d-block"><i class="ti ti-user"></i> {{ $user_checklist->nama }}</span>
                                <span class="fw-semibold d-block"><i class="ti ti-calendar"></i> {{ \Carbon\Carbon::create()->month($isi_checklist->first()->bulan)->locale('id')->translatedFormat('F') }}</span>
                                <span class="fw-semibold d-block">
                                    <i class="ti ti-building"></i> 
                                    @php $row = $isi_checklist->first() @endphp
                                    {{ $row?->dealer?->nama ?? '-' }}
                                </span>
                                <form action="{{ route('summary.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_checklist_id" value="{{ $user_checklist->id }}">
                                    <input type="hidden" name="dealer_id" value="{{ $isi_checklist->first()->dealer_id }}">
                                    <input type="hidden" name="bulan" value="{{ $isi_checklist->first()->bulan }}">
                                    <table class="table mt-4">
                                        <tr>
                                            <th>Proses</th>
                                            <th>PI</th>
                                            <th>CA</th>
                                        </tr>
                                        @foreach ($isi_checklist as $row)
                                        <tr>
                                            <td>
                                                <textarea name="proses[]" class="form-control" rows="10" required>@plainText($row->pertanyaan)</textarea>
                                            </td>
                                            <td>
                                                <textarea name="pi[]" class="form-control" required>{{ $row->keterangan }}</textarea>
                                            </td>
                                            <td>
                                                <textarea name="ca[]" class="form-control" required></textarea>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-danger rounded-2"><i class="ti ti-check"></i> Simpan</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                @endif
                            
                            @else 
                            <b><i class="ti ti-user"></i> {{ $user_checklist->nama }}</b>
                            @include('summary.search')
                            <div class="text-center">
                                <img src="{{ asset('assets/icons/empty_search.svg') }}" width="200" alt="Empty Search">
                                <h4>Data summary belum ada atau belum bisa diisi, karena belum isi checklist</h4>
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