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
                            <b><i class="ti ti-user"></i> {{ $user_checklist->nama }}</b>
                            <form action="{{ route('summary.view') }}" method="get" class="mt-4">
                                <div class="row">
                                    <div class="form-group mb-2 col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="bulan"><i class="ti ti-calendar"></i></span>
                                            <input type="hidden" name="id" value="{{ $user_checklist->id }}">
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
                                            <span class="input-group-text" id="dealer"><i class="ti ti-building"></i></span>
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
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection