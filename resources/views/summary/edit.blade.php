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
                            <h4 class="card-title">Ubah Summary</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block"><i class="ti ti-user"></i> {{ $summary->first()->userchecklist->nama }}</span>
                            <span class="fw-semibold d-block"><i class="ti ti-calendar"></i> {{ \Carbon\Carbon::create()->month($summary->first()->bulan)->locale('id')->translatedFormat('F') }}</span>
                            <span class="fw-semibold d-block">
                                <i class="ti ti-building"></i> 
                                @php $row = $summary->first() @endphp
                                {{ $row?->dealer?->nama ?? '-' }}
                            </span>
                            <form action="{{ route('summary.update', ['user_checklist_id' => $user_checklist_id, 'dealer_id' => $dealer_id, 'bulan' => $bulan]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_checklist_id" value="{{ $user_checklist_id }}">
                                <input type="hidden" name="dealer_id" value="{{ $dealer_id }}">
                                <input type="hidden" name="bulan" value="{{ $bulan }}">
                                <table class="table mt-4">
                                    <tr>
                                        <th>Proses</th>
                                        <th>PI</th>
                                        <th>CA</th>
                                    </tr>
                                    @foreach ($summary as $row)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id[]" value="{{ $row->id }}">
                                            <textarea name="proses[]" class="form-control" rows="10" required>{{ $row->proses }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="pi[]" class="form-control" required>{{ $row->pi }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="ca[]" class="form-control" required>{{ $row->ca }}</textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection