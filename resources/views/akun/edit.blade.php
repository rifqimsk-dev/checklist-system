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
                            Detail dan Update Akun
                        </h4>
                        <form class="floating-labels mt-4 pt-2" action="{{ route('akun.update', $akun->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ @old('name', $akun->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                />
                                <span class="bar"></span>
                                <label for="name">Nama</label>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="email"
                                    value="{{ @old('email', $akun->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                />
                                <span class="bar"></span>
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                />
                                <span class="bar"></span>
                                <label for="password">Password</label>
                                <small>Isi jika mengubah password</small>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                                    <option value="" selected disabled>Role</option>
                                    <option {{ ($akun->role == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                                    <option {{ ($akun->role == 'auditor') ? 'selected' : '' }} value="auditor">Auditor</option>
                                </select>
                                <span class="bar"></span>
                                @error('role')
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
                <form action="{{ route('akun.destroy', $akun->id) }}" method="POST" class="d-inline">
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