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
                            Tambah User Checklist Baru
                        </h4>
                        <form class="floating-labels mt-4 pt-2" action="{{ route('userchecklist.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    name="nama"
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
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
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
                                <button type="reset" class="btn btn-light">
                                    <i class="ti ti-arrow-back-up fs-4 me-2"></i
                                    >Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection