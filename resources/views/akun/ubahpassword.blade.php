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
                        <div class="card-header">
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profil.password.update', auth()->id()) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="text" autocomplete="off" name="password_lama" value="{{ old('password_lama') }}" id="password_lama" class="form-control @error('password_lama') is-invalid @enderror">
                                    @error('password_lama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="text" autocomplete="off" name="password_baru" value="{{ old('password_baru') }}" id="password_baru" class="form-control @error('password_baru') is-invalid @enderror">
                                    @error('password_baru')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
                                    <input type="text" autocomplete="off" name="konfirmasi_password_baru" value="{{ old('konfirmasi_password_baru') }}" id="konfirmasi_password_baru" class="form-control @error('konfirmasi_password_baru') is-invalid @enderror">
                                    @error('konfirmasi_password_baru')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-danger"><i class="ti ti-edit"></i> Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection