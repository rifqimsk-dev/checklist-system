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
                            <h4 class="card-title">Data Departemen</h4>
                            <a href="" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-outline-danger rounded-2 mt-2">
                                <i class="ti ti-plus"></i> Tambah Departemen
                            </a>
                            <div class="table-responsive mt-3">
                                <table
                                    id="zero_config"
                                    class="table text-nowrap table-hover align-middle"
                                >
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th width="1">No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Opsi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach ($departemen as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->kode }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#ubah{{ $row->id }}" class="btn btn-sm btn-dark rounded-circle"><i class="ti ti-search"></i></a>

                                                <div class="modal fade" id="ubah{{ $row->id }}" tabindex="-1" aria-labelledby="ubah" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex align-items-center">
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    Ubah Departemen
                                                                </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('departemen.update', $row->id) }}" method="POST" class="floating-labels">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group mb-4">
                                                                        <input
                                                                            type="text"
                                                                            name="kode"
                                                                            value="{{ @old('kode', $row->kode) }}"
                                                                            class="form-control @error('kode') is-invalid @enderror"
                                                                            id="kode"
                                                                        />
                                                                        <span class="bar"></span>
                                                                        <label for="nama">Masukkan Kode Departemen</label>
                                                                        @error('kode')
                                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group mb-4">
                                                                        <input
                                                                            type="text"
                                                                            name="nama"
                                                                            value="{{ @old('nama', $row->nama) }}"
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            id="nama"
                                                                        />
                                                                        <span class="bar"></span>
                                                                        <label for="nama">Masukkan Nama Departemen</label>
                                                                        @error('nama')
                                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger rounded-2">
                                                                        <i class="ti ti-check"></i> 
                                                                        Simpan
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('departemen.destroy', $row->id) }}" method="POST" class="d-inline float-left">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn bg-danger-subtle text-danger rounded-2">
                                                                        <i class="ti ti-trash"></i> 
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Tambah Departemen Baru
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('departemen.store') }}" method="POST" class="floating-labels">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-4">
                        <input
                            type="text"
                            name="kode"
                            class="form-control @error('kode') is-invalid @enderror"
                            id="kode"
                        />
                        <span class="bar"></span>
                        <label for="kode">Masukkan Kode Departemen</label>
                        @error('kode')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <input
                            type="text"
                            name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                        />
                        <span class="bar"></span>
                        <label for="nama">Masukkan Nama Departemen</label>
                        @error('nama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger rounded-2" id="btn-save">
                        <i class="ti ti-check"></i> 
                        Simpan
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    document.getElementById('btn-save').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = 'Saving...'; // opsional
        this.closest('form').submit();
    });

</script>

@endsection