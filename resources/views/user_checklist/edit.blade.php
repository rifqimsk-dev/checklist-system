@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ url()->previous() }}" class="btn p-0 bg-white">
                                <i class="ti ti-arrow-left fs-8 me-4"></i>
                            </a>
                            Detail dan Update User Checklist
                        </h4>
                        <form class="floating-labels mt-4 pt-2" action="{{ route('userchecklist.update', $checklist->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="nama"
                                    value="{{ @old('nama', $checklist->nama) }}"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama"
                                />
                                <span class="bar"></span>
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="auditor"
                                    value="{{ @old('auditor', $checklist->auditor) }}"
                                    class="form-control @error('auditor') is-invalid @enderror"
                                    id="auditor"
                                />
                                <span class="bar"></span>
                                <label for="auditor">Auditor</label>
                                @error('auditor')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                                    <option value="" selected disabled>User</option>
                                    @foreach ($user as $row)
                                        <option {{ ($row->id == $checklist->user_id) ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <span class="bar"></span>
                                @error('user_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <a href="" data-bs-toggle="modal" data-bs-target="#hapus" class="btn bg-danger-subtle text-danger float-end"><i class="ti ti-trash"></i> Hapus</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Hapus Data
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menghapus data ini ?</h4>
                <p>
                    Data akan dihapus secara permanen dan tidak bisa dipulihkan kembali
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('userchecklist.destroy', $checklist->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-danger-subtle text-danger  waves-effect">
                        <i class="ti ti-trash"></i> 
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection